@extends("base")
@section("content")
<section class="content-main">
    <div class="content-header">
        <div>
            <h2 class="content-title card-title">Appointment Register </h2>
            <p>Hello, {{ Session::get('patient')->patient_name }}</p>
        </div>
        <div><a class="btn btn-primary" href="{{ route('appointment.create') }}">Create New</a></div>        
    </div>
    <div class="row">
        <div class="col-12">@include("message")</div>
        <div class="col-lg-12">
            <h5>Call: +91 9188836222</h5>
            <div class="card card-body mb-4 table-responsive">
                <table id="dataTable" class="table table-sm table-striped">
                    <thead><tr><th>SL No<th>Patient Name</th><th>Mobile Number</th><th>Appointment Date</th><th>Time</th><th>Doctor</th><th>Branch</th><th>Status</th></tr></thead><tbody>
                        @forelse($data as $key => $item)
                        <tr>
                            <td>{{ $key+1 }}</td>
                            <td>{{ $item->patient_name }}</td>
                            <td>{{ $item->mobile_number }}</td>
                            <td>{{ date('d/M/Y', strtotime($item->appointment_date)) }}</td>
                            <td>{{ date('h:i A', strtotime($item->appointment_time)) }}</td>
                            <td>{{ ($item->doctor) ? doctors()->where('id', $item->doctor)->first()->doctor_name : '' }}</td>
                            <td>{{ branches()->where('id', $item->branch)->first()->display_name }}</td>
                            <td>{{ ($item->doctor && $item->appointment_time) ? 'Confirmed' : 'Pending' }}</td>
                        </tr>
                        @empty
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</section> <!-- content-main end// -->
@endsection