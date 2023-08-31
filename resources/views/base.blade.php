<!DOCTYPE HTML>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Devi Eye Hospitals Customer Portal</title>
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta property="og:title" content="">
    <meta property="og:type" content="">
    <meta property="og:url" content="">
    <meta property="og:image" content="">
    <!-- Favicon -->
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('/assets/imgs/theme/favicon.svg') }}">    
    <!-- Template CSS -->
    <link href="{{ asset('/assets/css/main.css') }}" rel="stylesheet" type="text/css" />
    <link href="https://cdn.datatables.net/1.13.6/css/dataTables.bootstrap5.min.css" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="{{ asset('/assets/css/style.css') }}" rel="stylesheet" type="text/css" />
</head>

<body>
    @php $patient = Session::get('patient') @endphp
    <div class="screen-overlay"></div>
    <aside class="navbar-aside" id="offcanvas_aside">
        <div class="aside-top">
            <a href="{{ route('dashboard') }}" class="brand-wrap">
                <img src="{{ asset('/assets/imgs/misc/Devi-Logo-Transparent.jpg') }}" class="logo" alt="Dashboard">
            </a>
            <div>
                <button class="btn btn-icon btn-aside-minimize"> <i class="text-muted material-icons md-menu_open"></i> </button>
            </div>
        </div>
        <nav>
            <ul class="menu-aside">
                <li class="menu-item {{ (request()->segment(1) == 'dashboard') ? 'active' : '' }}">
                    <a class="menu-link" href="{{ route('dashboard') }}"> <i class="icon material-icons md-home"></i>
                        <span class="text">Dashboard</span>
                    </a>
                </li>
                <li class="menu-item has-submenu {{ (in_array(request()->segment(1), ['prescription', 'appointment', 'feedback'])) ? 'active' : '' }}">
                    <a class="menu-link" href="#"> <i class="icon material-icons md-plus"></i>
                        <span class="text">Main Menu</span>
                    </a>
                    <div class="submenu">
                        <a href="{{ route('prescription') }}">My Prescriptions</a>
                        <a href="{{ route('appointment') }}">My Appointments</a>
                        <a href="{{ route('feedback') }}">My Feedbacks</a>
                    </div>
                </li>
            </ul>
        </nav>
    </aside>
    <main class="main-wrap">
        <header class="main-header navbar">
            <div class="col-search">
            </div>
            <div class="col-nav">
                <button class="btn btn-icon btn-mobile me-auto" data-trigger="#offcanvas_aside"> <i class="material-icons md-apps"></i> </button>
                <ul class="nav">
                    <li class="nav-item">
                        <a class="nav-link btn-icon darkmode" href="#"> <i class="material-icons md-nights_stay"></i> </a>
                    </li>
                    <li class="dropdown nav-item">
                        <a class="dropdown-toggle" data-bs-toggle="dropdown" href="#" id="dropdownAccount" aria-expanded="false"> <img class="img-xs rounded-circle" src="{{ (!empty(Auth::user()->photo)) ? url(Auth::user()->photo) : asset('/assets/imgs/people/avatar1.jpg') }}" alt="User"></a>
                        <div class="dropdown-menu dropdown-menu-end" aria-labelledby="dropdownAccount">
                            <a class="dropdown-item" href="{{ route('dashboard') }}"><strong>Hi, {{ $patient->patient_name }}</strong></a>
                            <a class="dropdown-item text-danger" href="{{ route('logout') }}"><i class="material-icons md-exit_to_app"></i>Logout</a>
                        </div>
                    </li>
                </ul>
            </div>
        </header>
        @yield("content")
        <footer class="main-footer font-xs">
            <div class="row pb-30 pt-15">
                <div class="col-sm-6">
                    <script>
                    document.write(new Date().getFullYear())
                    </script> ©, Devi Eye Hospitals .
                </div>
                <div class="col-sm-6">
                    <div class="text-sm-end">
                        All rights reserved
                    </div>
                </div>
            </div>
        </footer>
    </main>
    <script src="{{ asset('/assets/js/vendors/jquery-3.6.0.min.js') }}"></script>
    <script src="{{ asset('/assets/js/vendors/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('/assets/js/vendors/select2.min.js') }}"></script>
    <script src="{{ asset('/assets/js/vendors/perfect-scrollbar.js') }}"></script>
    <script src="{{ asset('/assets/js/vendors/jquery.fullscreen.min.js') }}"></script>
    <script src="{{ asset('/assets/js/vendors/chart.js') }}"></script>
    <!-- Main Script -->
    <script src="{{ asset('/assets/js/main.js') }}" type="text/javascript"></script>
    <script src="{{ asset('/assets/js/custom-chart.js') }}" type="text/javascript"></script>
    <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js" type="text/javascript"></script>    
    <script src="https://cdn.datatables.net/1.13.6/js/dataTables.bootstrap5.min.js" type="text/javascript"></script>    
    <script src="{{ asset('/assets/js/script.js') }}" type="text/javascript"></script>

    @include("message")
</body>

</html>