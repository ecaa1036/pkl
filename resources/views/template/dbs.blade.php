@extends('template.navbar')
@section('content')

<div class="container-fluid" id="container-wrapper">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="./">Home</a></li>
            <li class="breadcrumb-item active" aria-current="page">Dashboard</li>
        </ol>
    </div>
    <div class="row mb-3">
        <!-- Earnings (Monthly) Card Example -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card h-100">
                <div class="card-body">
                    <div class="row align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-uppercase mb-1">ADMIN</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">{{$user}}</div>
                            
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-calendar fa-2x text-primary"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card h-100">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-uppercase mb-1">GURU</div>
                            <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800">{{$guru}}</div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-users fa-2x text-info"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    <!-- Earnings (Annual) Card Example -->
    <div class="col-xl-3 col-md-6 mb-4">
      <div class="card h-100">
        <div class="card-body">
          <div class="row no-gutters align-items-center">
            <div class="col mr-2">
              <div class="text-xs font-weight-bold text-uppercase mb-1">KELAS</div>
              <div class="h5 mb-0 font-weight-bold text-gray-800">{{$kelas}}</div>
             
            </div>
            <div class="col-auto">
                <i class="fas fa-list fa-sm fa-fw mr-2 fa-2x  text-success"></i>
              {{-- <i class="fas fa-shopping-cart fa-2x text-success"></i> --}}
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- New User Card Example -->
    <!-- Pending Requests Card Example -->
    <div class="col-xl-3 col-md-6 mb-4">
      <div class="card h-100">
        <div class="card-body">
          <div class="row no-gutters align-items-center">
            <div class="col mr-2">
              <div class="text-xs font-weight-bold text-uppercase mb-1">SISWA</div>
              <div class="h5 mb-0 font-weight-bold text-gray-800">{{$siswa}}</div>
             
            </div>
            <div class="col-auto">
                <i class="fas fa-user-circle fa-2x text-warning"></i>
              {{-- <i class="fas fa-comments fa-2x text-warning"></i> --}}
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card h-100">
          <div class="card-body">
            <div class="row no-gutters align-items-center">
              <div class="col mr-2">
                <div class="text-xs font-weight-bold text-uppercase mb-1">INDUSTRI</div>
                <div class="h5 mb-0 font-weight-bold text-gray-800">{{$industri}}</div>
               
              </div>
              <div class="col-auto">
                <i class="fas fa-fw fa-columns fa-2x text-danger"></i>
                {{-- <i class="fas fa-comments fa-2x text-warning"></i> --}}
              </div>
            </div>
          </div>
        </div>
      </div>

  </div>
@endsection