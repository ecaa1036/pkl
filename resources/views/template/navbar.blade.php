<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <link href="image/smk.png" rel="icon">
  <title>Dashboard</title>
  <link rel="stylesheet" href="{{asset('template/vendor/fontawesome-free/css/all.min.css')}}">
  {{-- <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css"> --}}
  <link href="{{asset('template/vendor/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet" type="text/css">
  <link href="{{asset('template/css/ruang-admin.min.css')}}" rel="stylesheet">
  <link href="{{asset('template/vendor/datatables/dataTables.bootstrap4.min.css')}}" rel="stylesheet">

  <link href="{{asset('template/vendor/fontawesome-free/css/all.min.css')}}" rel="stylesheet" type="text/css">
  <link href="{{asset('template/vendor/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet" type="text/css">

</head>

<body id="page-top">
  <div id="wrapper">
    <!-- Sidebar -->
    <ul class="navbar-nav sidebar sidebar-light accordion" id="accordionSidebar">
      <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
        <div class="sidebar-brand-icon">
          <img src="/image/smk.png">
        </div>
        <div class="sidebar-brand-text mx-3">SMK YPC</div>
      </a>
      <hr class="sidebar-divider my-0">
      <li class="nav-item active">
        <a class="nav-link" href="http://127.0.0.1:8000/dasboard">
          <i class="fas fa-fw fa-tachometer-alt"></i>
          <span>Dashboard</span></a>
      </li>
      <hr class="sidebar-divider">
      <div class="sidebar-heading">
      <!-- halaman admin -->
      </div>

      <li class="nav-item">
        <a class="nav-link" href="http://127.0.0.1:8000/user">
          <i class="far fa-fw fa-window-maximize"></i>
          <span>Admin</span>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="http://127.0.0.1:8000/guru">
          <i class="fas fa-users"></i>
          <span>Guru</span>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="http://127.0.0.1:8000/kelas">
          <i class="fas fa-list fa-sm fa-fw mr-2"></i>
          <span>Kelas</span>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="http://127.0.0.1:8000/siswa">
          <i class="fas fa-user-circle"></i>
          <span>Siswa</span>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="http://127.0.0.1:8000/industri">
          <i class="fas fa-fw fa-columns"></i>
          <span>Industri</span>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="http://127.0.0.1:8000/kehadiran">
          <i class="fas fa-angle-double-right"></i>
          <span>Kehadiran</span>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="http://127.0.0.1:8000/monitoring">
          <i class="fas fa-paperclip"></i>
          <span>Kelompok Prakerin</span>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="http://127.0.0.1:8000/aktivitas">
          <i class="fas fa-paperclip"></i>
          <span>Aktivitas</span>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="http://127.0.0.1:8000/logout">
          <i class="fas fa-sign-out-alt fa-sm"></i>
          <span>Logout</span>
        </a>
      </li>
      <hr class="sidebar-divider">
      <!-- <div class="version" id="version-ruangadmin"></div> -->
    </ul>
    <!-- Sidebar -->
    <div id="content-wrapper" class="d-flex flex-column">
      <div id="content">
        <!-- TopBar -->
        <nav class="navbar navbar-expand navbar-light bg-navbar topbar mb-4 static-top">
          <button id="sidebarToggleTop" class="btn btn-link rounded-circle mr-3">
            <i class="fa fa-bars"></i>
          </button>
          <ul class="navbar-nav ml-auto">
            <li class="nav-item dropdown no-arrow">
              <a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button" data-toggle="dropdown"
                aria-haspopup="true" aria-expanded="false">
                <i class="fas fa-search fa-fw"></i>
              </a>
              <div class="dropdown-menu dropdown-menu-right p-3 shadow animated--grow-in"
                aria-labelledby="searchDropdown">
                <form class="navbar-search">
                  <div class="input-group">
                    <input type="text" class="form-control bg-light border-1 small" placeholder="What do you want to look for?"
                      aria-label="Search" aria-describedby="basic-addon2" style="border-color: #112cc8;">
                    <div class="input-group-append">
                      <button class="btn btn-primary" type="button">
                        <i class="fas fa-search fa-sm"></i>
                      </button>
                    </div>
                  </div>
                </form>
              </div>
            </li>
            
            <div class="topbar-divider d-none d-sm-block"></div>
            <li class="nav-item dropdown no-arrow">
              <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown"
                aria-haspopup="true" aria-expanded="false">
                <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                {{-- <img class="img-profile rounded-circle" src="img/boy.png" style="max-width: 60px"> --}}
                <span class="ml-2 d-none d-lg-inline text-white small">{{Auth::user()->username}}</span>
              </a>
              <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                <a class="dropdown-item" href="#">
                  <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                  Profile
                </a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="javascript:void(0);" data-toggle="modal" data-target="#logoutModal">
                  <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                  Logout
                </a>
              </div>
            </li>
          </ul>
        </nav>
        
      @yield('content')
    </div>
  </div>

  <script>
    $(document).ready(function () {
      $('#dataTable').DataTable(); // ID From dataTable 
      $('#dataTableHover').DataTable(); // ID From dataTable with Hover
    });
  </script>

    <!-- Page level plugins -->
    <script src="{{asset('template/vendor/datatables/jquery.dataTables.min.js')}}"></script>
    <script src="{{asset('template/vendor/datatables/dataTables.bootstrap4.min.js')}}"></script>
    
    <script src="{{asset('template/vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
    <script src="{{asset('template/vendor/jquery-easing/jquery.easing.min.js')}}"></script>
    <script src="{{asset('template/js/ruang-admin.min.js')}}"></script>

  <!-- Scroll to top -->
  <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a>
  <script src="{{asset('template/vendor/jquery/jquery.min.js')}}"></script>
  <script src="{{asset('template/vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
  <script src="{{asset('template/vendor/jquery-easing/jquery.easing.min.js')}}"></script>
  <script src="{{asset('template/js/ruang-admin.min.js')}}"></script>
  <script src="{{asset('template/vendor/chart.js/Chart.min.js')}}"></script>
  <script src="{{asset('template/js/demo/chart-area-demo.js')}}"></script>  
</body>
</html>