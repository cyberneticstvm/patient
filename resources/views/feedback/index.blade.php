@extends("base")
@section("content")
<section class="content-main">
    <div class="content-header">
        <div>
            <h2 class="content-title card-title">Feedback Register </h2>
            <p>Hello, {{ Session::get('patient')->patient_name }}</p>
        </div>
        <div><a class="btn btn-primary" href="{{ route('feedback.create') }}">Create New</a></div>        
    </div>
    <div class="row">
        <div class="col-12">@include("message")</div>
        <div class="col-lg-12">
            <div class="card card-body mb-4 ">
                <table id="dataTable" class="table table-sm table-striped">
                    <thead><tr><th>SL No<th>Date</th><th>Type</th><th>Feedback</th></tr></thead><tbody>
                        @forelse($data as $key => $item)
                        <tr>
                            <td>{{ $key+1 }}</td>
                            <td>{{ date('d/M/Y', strtotime($item->created_at)) }}</td>
                            <td>{{ $item->type }}</td>
                            <td>{{ $item->feedback }}</td>
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