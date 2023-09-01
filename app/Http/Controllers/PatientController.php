<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use DB;
use QrCode;
use PDF;

class PatientController extends Controller
{
    public function login(){
        return view('login');
    }

    public function generateOtp(Request $request){
        $validator = Validator::make($request->all(), [
            'mobile' => 'required|numeric|digits:10',
        ]);
        if($validator->fails()):
            echo "Not a valid mobile number!";
        else:
            $patient = DB::table('patient_registrations')->where('mobile_number', $request->mobile)->first();
            $otp = random_int(1000, 9999);
            if($patient):                
                DB::table('patient_registrations')->where('mobile_number', $request->mobile)->update(['otp' => $otp]);
            else:
                $id = DB::table('patient_bookings')->insertGetId(
                    ['patient_name' => 'Guest', 'mobile_number' => $request->mobile, 'otp' => $otp, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()]
                );
            endif;
            /*$msg = "Dear User, Your OTP for login to Devi Eye Hospital Portal is ".$otp." valid for 15 minutes. Please do not share this OTP. Regards Devi Eye Hospitals.";                
            Config::set('myconfig.sms.number', $request->mobile);
            Config::set('myconfig.sms.message', $msg);
            $sms = sendSms(Config::get('myconfig.sms'));*/
            echo "1";
        endif;
    }

    public function validateOtp(Request $request){
        $this->validate($request, [
            'mobile' => 'required|numeric|digits:10',
            'otp' => 'required|numeric|digits:4',
        ]);
        $patient = DB::table('patient_registrations')->where('mobile_number', $request->mobile)->where('otp', $request->otp)->first();
        $patient_new = DB::table('patient_bookings')->where('mobile_number', $request->mobile)->where('otp', $request->otp)->first();        
        if($patient && $patient->otp):
            Session::put('patient', $patient);
            return redirect()->route('dashboard')->with("success", "OTP Succesfully Validated");
        elseif($patient_new && $patient_new->otp):
            Session::put('patient', $patient_new);
            return redirect()->route('dashboard')->with("success", "OTP Succesfully Validated");
        endif;
        return redirect()->back()->withInput($request->all())->with("error", "Invalid access");
    }

    public function dashboard(){
        return view('dash');
    }

    public function prescription(){
        $data = DB::table('spectacles')->where('patient_id', Session::get('patient')->id)->latest()->get();
        return view('prescription.index', compact('data'));
    }

    public function prescriptionPDF($id){
        $spectacle = DB::table('spectacles')->where('patient_id', Session::get('patient')->id)->where('id', $id)->first();
        $patient = DB::table('patient_registrations')->find(Session::get('patient')->id);      
        $pdf = PDF::loadView('/prescription/pdf', ['spectacle' => $spectacle, 'patient' => $patient]);
        header("Content-Type: application/octet-stream");
        header("Content-Disposition: attachment; filename=prescription.pdf");
        return $pdf->output();    
        //return $pdf->stream('prescription.pdf', array("Attachment"=>true));
    }

    public function appointments(){
        if(Session::get('patient')->patient_name == 'Guest'):
            $data = DB::table('appointments')->Where('mobile_number', Session::get('patient')->mobile_number)->latest()->get();
        else:
            $data = DB::table('appointments')->where('patient_id', Session::get('patient')->id)->orWhere('mobile_number', Session::get('patient')->mobile_number)->latest()->get();
        endif;
        return view('appointment.index', compact('data'));
    }

    public function appointment(){
        $branches = DB::table('branches')->where('booking_available', 1)->get();
        $patients = DB::table('patient_registrations')->where('mobile_number', Session::get('patient')->mobile_number)->get();
        return view('appointment.create', compact('branches', 'patients'));
    }

    public function saveAppointment(Request $request){
        $this->validate($request, [
            'patient_name' => 'required',
            'mobile_number' => 'required|numeric|digits:10',
            'gender' => 'required',
            'age' => 'required',
            'address' => 'required',
            'patient_id' => 'required',
            'appointment_date' => 'required',
            'branch' => 'required',
        ]);

        DB::table('appointments')->insert([
            'patient_name' => $request->patient_name,
            'mobile_number' => $request->mobile_number,
            'gender' => $request->gender,
            'age' => $request->age,
            'address' => $request->address,
            'patient_id' => $request->patient_id,
            'appointment_date' => $request->appointment_date,
            'branch' => $request->branch,
            'type' => 'app',
            'created_by' => 0,
            'updated_by' => 0,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
        return redirect()->route('appointments')->with("success", "Appointment Created Successfully!");
    }

    public function feedbacks(){
        $data = DB::table('feedback')->where('created_by', Session::get('patient')->id)->latest()->get();
        return view('feedback.index', compact('data'));
    }

    public function feedback(){
        return view('feedback.create');
    }

    public function saveFeedback(Request $request){
        $this->validate($request, [
            'type' => 'required',
            'feedback' => 'required',
        ]);
        DB::table('feedback')->insert([
            'type' => $request->type,
            'feedback' => $request->feedback,
            'created_by' => Session::get('patient')->id,
            'updated_by' => Session::get('patient')->id,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
        return redirect()->route('feedbacks')->with("success", "Feedback Submitted Successfully!");
    }

    public function logout(Request $request){
        if(Session::get('patient')->patient_name == 'Guest'):
            DB::table('patient_bookings')->where('id', Session::get('patient')->id)->update(['otp' => NULL]);
        else:
            DB::table('patient_registrations')->where('id', Session::get('patient')->id)->update(['otp' => NULL]);
        endif;
        Auth::guard('web')->logout();
        $request->session()->invalidate();
        $request->session()->flush();
        $request->session()->regenerateToken();
        return redirect('/');
    }
}
