@extends("base")
@section("content")
<section class="content-main">
    <div class="content-header">
        <div>
            <h2 class="content-title card-title">Spectacle Prescription </h2>
            <p>Hello, {{ Session::get('patient')->patient_name }}</p>
        </div>
        @include("message")
    </div>
    <div class="row">
        <div class="col-lg-12">
            <div class="card card-body mb-4 ">
                <table id="dataTable" class="table table-sm table-striped">
                    <thead><tr><th>SL No<th>Medical Record No</th><th>Date</th><th>View/Download</th></tr></thead><tbody>
                        @forelse($data as $key => $item)
                        <tr>
                            <td>{{ $key+1 }}</td>
                            <td>{{ $item->medical_record_id }}</td>
                            <td>{{ date('d/M/Y', strtotime($item->created_at)) }}</td>
                            <td class="text-center"><a href="{{ route('prescription.html', $item->id) }}"><i class="fa fa-file"></i></a></td>
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