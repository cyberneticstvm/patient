@extends("base")
@section("content")
<section class="content-main">
    <div class="content-header">
        <div class="col-10">
            <h2 class="content-title card-title">Create New Feedback</h2>
            <p>Hello, {{ Session::get('patient')->patient_name }}</p>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12">
            <div class="card card-body mb-4">
                <form method="post" action="{{ route('feedback.save') }}">
                    @csrf
                    <div class="row">
                        <div class="col-md-8">
                            <div class="row">
                                <div class="col-6">
                                    <div class="mb-3">
                                        <label class="form-label">Type</label>
                                        {{ html()->select($name = 'type', $value = array('complaint' => 'Complaint', 'enquiry' => 'Enquiry', 'other' => 'Other'), Session::get('patient')->gender)->class('form-control select2')->placeholder('Select') }}
                                        @error('type')
                                        <small class="text-danger">{{ $errors->first('type') }}</small>
                                        @enderror
                                    </div> <!-- form-group// -->
                                </div>
                                <div class="col-12">
                                    <div class="mb-3">
                                        <label class="form-label">Feedback</label>
                                        {{ html()->textarea($name = 'feedback', $value = NULL)->class('form-control')->placeholder('Feedback') }}
                                        @error('feedback')
                                        <small class="text-danger">{{ $errors->first('feedback') }}</small>
                                        @enderror
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