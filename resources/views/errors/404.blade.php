@extends('base')
@section("content")
<section class="content-main">
    <div class="content-header">
        <div>
            <h2 class="content-title card-title">Error </h2>
            <p>Devi Eye Hospitals</p>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12">
            <div class="card card-body mb-4">
                <h5 class="text-danger">{{ $exception->getMessage() }}</h5>
            </div>
        </div>
    </div>
</section> <!-- content-main end// -->
@endsection
