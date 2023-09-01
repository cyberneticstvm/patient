<!DOCTYPE HTML>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Devi Eye Hospitals Customer Portal Login</title>
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta property="og:title" content="">
    <meta property="og:type" content="">
    <meta property="og:url" content="">
    <meta property="og:image" content="">
    <!-- Favicon -->
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('/assets/imgs/devi-logo.jpeg') }}">
    <!-- Template CSS -->
    <link href="{{ asset('/assets/css/main.css') }}" rel="stylesheet" type="text/css" />
</head>
<body>
    <main>
        <section class="content-main mt-80">
            <div class="card mx-auto card-login">
                <div class="card-body">
                    <div class="text-center"><img src="{{ asset('/assets/imgs/devi-logo.jpeg') }}" class="logo img-fluid" width="50%" alt="Devi EH"></div>
                    <h4 class="card-title mb-4">Sign in</h4>
                    <form method="POST" action="{{ route('login') }}">
                        @csrf
                        <div class="mb-3">
                            <input class="form-control" id="mobile" name="mobile" placeholder="Mobile Number" type="text" maxlength="10" value="{{ old('mobile') }}">
                            @error('mobile')
                            <small class="text-danger">{{ $errors->first('mobile') }}</small>
                            @enderror
                        </div> <!-- form-group// -->
                        <div class="mb-3">
                            <a href="javascript:void(0)" id="otp" class="float-end font-sm text-primary otp fw-bold fs-6 mb-3">Click here to generate OTP</a>
                        </div> <!-- form-group form-check .// -->
                        <div class="mb-3">
                            <input class="form-control" name="otp" placeholder="OTP" type="text" maxlength="4">
                            @error('otp')
                            <small class="text-danger">{{ $errors->first('otp') }}</small>
                            @enderror
                        </div> <!-- form-group// -->                        
                        <div class="mb-4">
                            <button type="submit" class="btn btn-submit btn-primary w-100"> Login </button>
                        </div> <!-- form-group// -->
                    </form>
                    <div class="msg"></div>
                    @include("message")
                </div>
            </div>
        </section>
    </main>
    <script src="{{ asset('/assets/js/vendors/jquery-3.6.0.min.js') }}"></script>
    <script src="{{ asset('/assets/js/vendors/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('/assets/js/vendors/select2.min.js') }}"></script>
    <script src="{{ asset('/assets/js/vendors/jquery.fullscreen.min.js') }}"></script>
    <!-- Main Script -->
    <script src="{{ asset('/assets/js/main.js') }}"></script>
    <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js" type="text/javascript"></script>    
    <script src="https://cdn.datatables.net/1.13.6/js/dataTables.bootstrap5.min.js" type="text/javascript"></script>
    <script src="{{ asset('/assets/js/script.js') }}" type="text/javascript"></script>
</body>

</html>