@extends('template.dasboard')
@section('index')
        
    <div id="content-wrapper" class="d-flex flex-column">
      <div id="content">
        @if (session('pesan'))
                <div class="alert alert-success">
                    {{session('pesan')}}
                </div>       
        @endif
                    <h6 class="m-0 font-weight-bold text-primary"><a href="guru/create"><button class="btn btn-primary">Tambah+</button></a></h6>
                  </div>
                  <div class="table-responsive py-2">
                    <table id="zero_config" class="table table-striped table-bordered no-wrap">
                    <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama Guru</th>
                        <th>NOhp</th>
                        <th>Username</th>
                        <th>Aksi</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach ($guru as $key => $item )
                        <tr>
                            <td>{{$key+1}}</td>
                            <td>{{$item->nama_guru}}</td>
                            <td>{{$item->nohp_guru}}</td>
                            <td>{{$item->user->username}}</td>
                            <td>
                                <a href="guru/edit/{{$item->id_guru}}"><button class="btn btn-primary"> <i class="material-icons">Edit</i></button>
                                <a href="guru/delete/{{$item->id_guru}}"><button class="btn btn-danger">Delete</button></a>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                  </table>
                </div>

  </div>

  <!-- Page level custom scripts -->
  <script>
    $(document).ready(function () {
      $('#dataTable').DataTable(); // ID From dataTable 
      $('#dataTableHover').DataTable(); // ID From dataTable with Hover
    });
  </script>
@endsection
