@extends("base")
@section("content")
<section class="content-main">
    <div class="content-header">
        <div class="col-10">
            <h2 class="content-title card-title">Create New Appointment</h2>
            <p>Hello, {{ Session::get('patient')->patient_name }}</p>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12">
            <div class="card card-body mb-4">
                <form method="post" action="{{ route('appointment.save') }}">
                    @csrf
                    <div class="row">
                        <div class="col-md-8">
                            <div class="row">
                                <div class="col-6">
                                    <div class="mb-3">
                                        <label class="form-label">Patient Name</label>
                                        {{ html()->select($name = 'patient_name', $value = $patients->pluck('patient_name', 'patient_name'), NULL)->class('form-control select2')->placeholder('Select') }}
                                        @error('patient_name')
                                        <small class="text-danger">{{ $errors->first('patient_name') }}</small>
                                        @enderror
                                    </div> <!-- form-group// -->
                                </div>
                                <div class="col-6">
                                    <div class="mb-3">
                                        <label class="form-label">Mobile Number</label>
                                        {{ html()->text($name = 'mobile_number', $value = Session::get('patient')->mobile_number)->class('form-control')->maxlength(10)->placeholder('Mobile Number') }}
                                        @error('mobile_number')
                                        <small class="text-danger">{{ $errors->first('mobile_number') }}</small>
                                        @enderror
                                    </div> <!-- form-group// -->
                                </div>
                                <div class="col-6">
                                    <div class="mb-3">
                                        <label class="form-label">Gender</label>
                                        {{ html()->select($name = 'gender', $value = array('male' => 'Male', 'female' => 'Female', 'other' => 'Other'), Session::get('patient')->gender)->class('form-control select2')->placeholder('Select') }}
                                        @error('gender')
                                        <small class="text-danger">{{ $errors->first('gender') }}</small>
                                        @enderror
                                    </div> <!-- form-group// -->
                                </div>
                                <div class="col-6">
                                    <div class="mb-3">
                                        <label class="form-label">Age</label>
                                        {{ html()->number($name = 'age', $value = Session::get('patient')->age)->class('form-control')->placeholder('0') }}
                                        @error('age')
                                        <small class="text-danger">{{ $errors->first('age') }}</small>
                                        @enderror
                                    </div> <!-- form-group// -->
                                </div>
                                <div class="col-12">
                                    <div class="mb-3">
                                        <label class="form-label">Address</label>
                                        {{ html()->text($name = 'address', $value = Session::get('patient')->address)->class('form-control')->placeholder('Address') }}
                                        @error('address')
                                        <small class="text-danger">{{ $errors->first('address') }}</small>
                                        @enderror
                                    </div> <!-- form-group// -->
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4 card">
                            <div class="row">
                                <div class="col-6">
                                    <div class="mb-3">
                                        <label class="form-label">Appointment for (Patient ID)</label>
                                        {{ html()->select($name = 'patient_id', $value = array(Session::get('patient')->id => 'Myself', 0 => 'Other'), Session::get('patient')->id)->class('form-control select2')->placeholder('Select') }}
                                        @error('patient_id')
                                        <small class="text-danger">{{ $errors->first('patient_id') }}</small>
                                        @enderror
                                    </div> <!-- form-group// -->
                                </div>
                                <div class="col-6">
                                    <div class="mb-3">
                                        <label class="form-label">Appointment Date</label>
                                        {{ html()->date($name = 'appointment_date', $value = date('Y-m-d'))->class('form-control') }}
                                        @error('appointment_date')
                                        <small class="text-danger">{{ $errors->first('appointment_date') }}</small>
                                        @enderror
                                    </div> <!-- form-group// -->
                                </div>
                                <div class="col-12">
                                    <div class="mb-3">
                                        <label class="form-label">Branch</label>
                                        {{ html()->select($name = 'branch', $value = $branches->pluck('display_name', 'id'), NULL)->class('form-control select2')->placeholder('Select') }}
                                        @error('branch')
                                        <small class="text-danger">{{ $errors->first('branch') }}</small>
                                        @enderror
                                    </div> <!-- form-group// -->
                                </div>
                                <div class="col-12">
                                    <div class="mb-3">
                                        <label class="form-label">Notes / Special Requests</label>
                                        {{ html()->text($name = 'notes', $value = NULL)->class('form-control')->placeholder('Notes / Special Requests') }}
                                    </div> <!-- form-group// -->
                                </div>                           
                            </div>                            
                        </div>
                        <div class="mb-4 text-center">                                
                            <button type="button" onclick="history.back()" class="btn btn-warning">Cancel</button>
                            <button type="submit" onClick="javascript: return confirm('Are you sure want to proceed?')" class="btn btn-submit btn-primary">Submit</button>
                        </div> <!-- form-group// -->
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section> <!-- content-main end// -->
@endsection