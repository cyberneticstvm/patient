@extends("base")
@section("content")
<section class="content-main">
    <div class="content-header">
        <div>
            <h2 class="content-title card-title">Dashboard </h2>
            <p>Hello, {{ Session::get('patient')->patient_name }}</p>
        </div>
        @include("message")
    </div>
    <div class="row">
        <div class="col-lg-3">
            <div class="card card-body mb-4">
                <article class="icontext">
                    <div class="text">
                        <h6 class="mb-1 card-title"><span>My Prescriptions</span></h6>
                        <span class="text-sm">
                        <a href="{{ route('prescription') }}">View / Download Spectacle Prescription</a>
                        </span>
                    </div>
                </article>
            </div>
        </div>
        <div class="col-lg-3">
            <div class="card card-body mb-4">
                <article class="icontext">
                    <div class="text">
                        <h6 class="mb-1 card-title"><span>My Appointments</span></h6>
                        <span class="text-sm">
                            <a href="{{ route('appointments') }}">View / Make Appointments</a>
                        </span>
                    </div>
                </article>
            </div>
        </div>
        <div class="col-lg-3">
            <div class="card card-body mb-4">
                <article class="icontext">
                    <div class="text">
                        <h6 class="mb-1 card-title"><span>My Feedback</span></h6>
                        <span class="text-sm">
                            <a href="{{ route('feedbacks') }}">View / Submit Feedback</a>
                        </span>
                    </div>
                </article>
            </div>
        </div>
    </div>
</section> <!-- content-main end// -->
@endsection