@extends('template.dasboard')
@section('index')
        
    <div id="content-wrapper" class="d-flex flex-column">
      <div id="content">
        @if (session('pesan'))
                <div class="alert alert-success">
                    {{session('pesan')}}
                </div>       
        @endif

                    <h6 class="m-0 font-weight-bold text-primary"><a href="industri/create"><button class="btn btn-primary">Tambah+</button></a></h6>
                  </div>
                  <div class="table-responsive py-2">
                    <table id="zero_config" class="table table-striped table-bordered no-wrap">
                      <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama Industri</th>
                            <th>Pemilik Industri</th>
                            <th>Alamat Industri</th>
                            <th>Nohp Industri</th>
                            <th>Username Industri</th>
                            <th>Token Masuk</th>
                            <th>Token Keluar</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($industri as $key => $item )
                        <tr>
                            <td>{{$key+1}}</td>
                            <td>{{$item->nama_industri}}</td>
                            <td>{{$item->pemilik_industri}}</td>
                            <td>{{$item->alamat_industri}}</td>
                            <td>{{$item->nohp_industri}}</td>
                            <td>{{$item->user->username}}</td>
                            <td>{{$item->token_masuk}}</td>
                            <td>{{$item->token_keluar}}</td>
                            <td>
                                <a href="industri/edit/{{$item->id_industri}}"><button class="btn btn-info">Edit</button></a>
                                <a href="industri/delete/{{$item->id_industri}}"><button class="btn btn-danger">Delete</button></a>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                  </table>
                </div>
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
