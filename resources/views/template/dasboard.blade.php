<!DOCTYPE html>
<html dir="ltr" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <!-- Favicon icon -->
    <link rel="icon" type="{{asset('/image/smk.png')}}" sizes="16x16" href="{{asset('/image/smk.png ')}}">
    <title>Jurnal Prakerin</title>
    <!-- Custom CSS -->
    <link href="{{asset('dsb/assets/extra-libs/c3/c3.min.css')}}" rel="stylesheet">
    <link href="{{asset('dsb/assets/libs/chartist/dist/chartist.min.css')}}" rel="stylesheet">
    <link href="{{asset('dsb/assets/extra-libs/jvector/jquery-jvectormap-2.0.2.css')}}" rel="stylesheet" />
    <!-- Custom CSS -->
    <link href="{{asset('dsb/dist/css/style.min.css')}}" rel="stylesheet">
    <link href="{{asset('dsb/assets/extra-libs/datatables.net-bs4/css/dataTables.bootstrap4.css')}}" rel="stylesheet">

</head>

<body>
    <div class="preloader">
        <div class="lds-ripple">
            <div class="lds-pos"></div>
            <div class="lds-pos"></div>
        </div>
    </div>
    <!-- ============================================================== -->
    <!-- Main wrapper - style you can find in pages.scss -->
    <!-- ============================================================== -->
    <div id="main-wrapper" data-theme="light" data-layout="vertical" data-navbarbg="skin6" data-sidebartype="full"
        data-sidebar-position="fixed" data-header-position="fixed" data-boxed-layout="full">
        <!-- ============================================================== -->
        <!-- Topbar header - style you can find in pages.scss -->
        <!-- ============================================================== -->
        <header class="topbar" data-navbarbg="skin6">
            <nav class="navbar top-navbar navbar-expand-md">
                <div class="navbar-header" data-logobg="skin6">
                    <!-- This is for the sidebar toggle which is visible on mobile only -->
                    <a class="nav-toggler waves-effect waves-light d-block d-md-none" href="javascript:void(0)"><i
                            class="ti-menu ti-close"></i></a>
                    <!-- ============================================================== -->
                    <!-- Logo -->
                    <!-- ============================================================== -->
                    <div class="navbar-brand">
                        <!-- Logo icon -->
                        <a href="index.html">
                            <b class="logo-icon">
                                <!-- Dark Logo icon -->
                                <img src="/image/smk.png" height="60" width="70" >
                                {{-- <img src="{{asset('image/smk.png')}}" class="light-logo" alt="homepage" /> --}}
                                <!-- Light Logo icon -->
                                <img src="{{asset('image/smk.png')}}" class="light-logo" alt="homepage" />
                            </b>
                            <!--End Logo icon -->
                            <!-- Logo text -->
                            <span class="logo-text">
                                <!-- dark Logo text -->
                                {{-- <img src="{{asset('image/smk.png')}}" alt="homepage" class="dark-logo" /> --}}
                                {{-- <img src="{{asset('dsb/assets/images/logo-text.png')}}" alt="homepage" class="dark-logo" /> --}}
                                <!-- Light Logo text -->
                                <img src="{{asset('image/smk.png')}}" class="light-logo" alt="homepage" />
                                {{-- <h3>SMK YPC</h3> --}}
                            </span>
                        </a>
                    </div>
                    <a class="topbartoggler d-block d-md-none waves-effect waves-light" href="javascript:void(0)"
                        data-toggle="collapse" data-target="#navbarSupportedContent"
                        aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><i
                            class="ti-more"></i></a>
                </div>
                <!-- End Logo -->
                <div class="navbar-collapse collapse" id="navbarSupportedContent">
                    <!-- toggle and nav items -->
                    <ul class="navbar-nav float-left mr-auto ml-3 pl-1">
                        </li>
                       
                    </ul>
                    <!-- Right side toggle and nav items -->
                    <ul class="navbar-nav float-right">
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="javascript:void(0)" data-toggle="dropdown"
                                aria-haspopup="true" aria-expanded="false">
                                {{-- <img src="assets/images/users/profile-pic.jpg" alt="user" class="rounded-circle"
                                    width="40"> --}}
                                <span class="ml-2 d-none d-lg-inline-block"><span></span> <span
                                        class="text-dark">{{Auth::user()->username}}</span> <i data-feather="chevron-down"
                                        class="svg-icon"></i></span>
                            </a>
                            <div class="dropdown-menu dropdown-menu-right user-dd animated flipInY">
                                <!-- <div class="dropdown-divider"></div> -->
                                <a class="dropdown-item" href="http://127.0.0.1:8000/login"><i data-feather="log-in"
                                        class="svg-icon mr-2 ml-1"></i>
                                    Login</a>
                                    <a class="dropdown-item" href="http://127.0.0.1:8000/logout"><i data-feather="power"
                                        class="svg-icon mr-2 ml-1"></i>
                                    Logout</a>
                            </div>

                        </li>
                    </ul>
                </div>
            </nav>
        </header>
        <aside class="left-sidebar" data-sidebarbg="skin6">
            <!-- Sidebar scroll-->
            <div class="scroll-sidebar" data-sidebarbg="skin6">
                <!-- Sidebar navigation-->
                <nav class="sidebar-nav">
                    <ul id="sidebarnav">
                        @if (Auth::user()->level == 'admin')
                            
                        <li class="sidebar-item"> <a class="sidebar-link sidebar-link" href="http://127.0.0.1:8000/dasboard"
                                aria-expanded="false"><i data-feather="home" class="feather-icon"></i><span
                                    class="hide-menu">Dashboard</span></a></li>
                        <li class="list-divider"></li>
                        <li class="nav-small-cap"><span class="hide-menu"></span></li>

                        <li class="sidebar-item"> <a class="sidebar-link" href="http://127.0.0.1:8000/user"
                                aria-expanded="false"><i data-feather="aperture" class="feather-icon"></i><span
                                    class="hide-menu">Admin
                                </span></a>
                        </li>
                        <li class="sidebar-item"> <a class="sidebar-link sidebar-link" href="http://127.0.0.1:8000/guru"
                                aria-expanded="false"><i data-feather="box" class="feather-icon"></i><span
                                    class="hide-menu">Guru</span></a></li>

                        <li class="sidebar-item"> <a class="sidebar-link sidebar-link" href="http://127.0.0.1:8000/kelas"
                                 aria-expanded="false"><i data-feather="bar-chart" class="feather-icon"></i><span
                                    class="hide-menu">Kelas </span></a>
                        </li>
                        <li class="sidebar-item"> <a class="sidebar-link sidebar-link" href="http://127.0.0.1:8000/siswa"
                                aria-expanded="false"><i data-feather="sidebar" class="feather-icon"></i><span
                                    class="hide-menu">Siswa
                                </span></a>
                        </li>
                        <li class="sidebar-item"> <a class="sidebar-link sidebar-link" href="http://127.0.0.1:8000/industri"
                            aria-expanded="false"><i data-feather="grid" class="feather-icon"></i><span
                                class="hide-menu">Industri </span></a>
                         </li>
                        <li class="sidebar-item"> <a class="sidebar-link sidebar-link" href="http://127.0.0.1:8000/kehadiran"
                                aria-expanded="false"><i data-feather="file-text" class="feather-icon"></i><span
                                    class="hide-menu">Kehadiran </span></a>
                        </li>
                        <li class="sidebar-item"> <a class="sidebar-link sidebar-link" href="http://127.0.0.1:8000/monitoring"
                                aria-expanded="false"><i data-feather="tag" class="feather-icon"></i><span
                                    class="hide-menu">Kelompok Prakerin </span></a>
                        </li>

                        <li class="sidebar-item"> <a class="sidebar-link sidebar-link" href="http://127.0.0.1:8000/aktivitas"
                                aria-expanded="false"><i data-feather="file" class="feather-icon"></i><span
                                    class="hide-menu">Aktivitas
                                </span></a>
                        </li>
                        @elseif (Auth::user()->level == 'siswa')
                        <li class="sidebar-item"> <a class="sidebar-link sidebar-link" href="http://127.0.0.1:8000/kehadiran"
                            aria-expanded="false"><i data-feather="file-text" class="feather-icon"></i><span
                                class="hide-menu">Kehadiran </span></a>
                        </li>
                        <li class="sidebar-item"> <a class="sidebar-link sidebar-link" href="http://127.0.0.1:8000/aktivitas"
                            aria-expanded="false"><i data-feather="file" class="feather-icon"></i><span
                                class="hide-menu">Aktivitas
                            </span></a>
                        </li>
                        @elseif (Auth::user()->level == 'industri')
                        <li class="sidebar-item"> <a class="sidebar-link sidebar-link" href="http://127.0.0.1:8000/kehadiran"
                            aria-expanded="false"><i data-feather="file-text" class="feather-icon"></i><span
                                class="hide-menu">Kehadiran </span></a>
                        </li>
                        @elseif (Auth::user()->level == 'pemonitoring')
                        <li class="sidebar-item"> <a class="sidebar-link sidebar-link" href="http://127.0.0.1:8000/kehadiran"
                            aria-expanded="false"><i data-feather="file-text" class="feather-icon"></i><span
                                class="hide-menu">Kehadiran </span></a>
                        </li>
                        <li class="sidebar-item"> <a class="sidebar-link sidebar-link" href="http://127.0.0.1:8000/aktivitas"
                            aria-expanded="false"><i data-feather="file" class="feather-icon"></i><span
                                class="hide-menu">Aktivitas
                            </span></a>
                        </li>
                        @endif

                    </ul>
                </nav>
                <!-- End Sidebar navigation -->
            </div>
            <!-- End Sidebar scroll-->
        </aside>
        <div class="page-wrapper">
            <div class="container-fluid">
                <!-- Start First Cards -->
                <div class="card-group">
                    <div class="card border-right">
                        <div class="card-body">
                        
                            @yield('index')
                        </div>

                    </div> 
            </div>
        </div>
        
    </div>
{{-- Data Table --}}
<script src="{{asset('dsb/assets/extra-libs/datatables.net/js/jquery.dataTables.min.js')}}"></script>
<script src="{{asset('dsb/dist/js/pages/datatable/datatable-basic.init.js')}}"></script>

    <script src="{{asset('dsb/assets/libs/jquery/dist/jquery.min.js')}}"></script>
    <script src="{{asset('dsb/assets/libs/popper.js/dist/umd/popper.min.js')}}"></script>
    <script src="{{asset('dsb/assets/libs/bootstrap/dist/js/bootstrap.min.js')}}"></script>
    <!-- apps -->
    <!-- apps -->
    <script src="{{asset('dsb/dist/js/app-style-switcher.js')}}"></script>
    <script src="{{asset('dsb/dist/js/feather.min.js')}}"></script>
    <script src="{{asset('dsb/assets/libs/perfect-scrollbar/dist/perfect-scrollbar.jquery.min.js')}}"></script>
    <script src="{{asset('dsb/dist/js/sidebarmenu.js')}}"></script>
    <!--Custom JavaScript -->
    <script src="{{asset('dsb/dist/js/custom.min.js')}}"></script>
    <!--This page JavaScript -->
    <script src="{{asset('dsb/assets/extra-libs/c3/d3.min.js')}}"></script>
    <script src="{{asset('dsb/assets/extra-libs/c3/c3.min.js')}}"></script>
    <script src="{{asset('dsb/assets/libs/chartist/dist/chartist.min.js')}}"></script>
    <script src="{{asset('dsb/assets/libs/chartist-plugin-tooltips/dist/chartist-plugin-tooltip.min.js')}}"></script>
    <script src="{{asset('dsb/assets/extra-libs/jvector/jquery-jvectormap-2.0.2.min.js')}}"></script>
    <script src="{{asset('dsb/assets/extra-libs/jvector/jquery-jvectormap-world-mill-en.js')}}"></script>
    <script src="{{asset('dsb/dist/js/pages/dashboards/dashboard1.min.js')}}"></script>
</body>

</html>