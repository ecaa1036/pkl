@extends('template.dasboard')
@section('index')
        
    <div id="content-wrapper" class="d-flex flex-column">
      <div id="content">
        @if (session('pesan'))
                <div class="alert alert-success">
                    {{session('pesan')}}
                </div>       
        @endif
                    <h6 class="m-0 font-weight-bold text-primary"><a href="kelas/create"><button class="btn btn-primary">Tambah+</button></a></h6>
                  </div>
                  <div class="table-responsive py-2">
                    <table id="zero_config" class="table table-striped table-bordered no-wrap">
                      <thead>
                        <tr>
                            <th>No</th>
                            <th>Kelas</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($kelas as $key => $item )
                        <tr>
                            <td>{{$key+1}}</td>
                            <td>{{$item->kelas}}</td>
                            <td>
                                <a href="kelas/edit/{{$item->id_kelas}}"><button class="btn btn-success">Edit</button></a>
                                <a href="kelas/delete/{{$item->id_kelas}}"><button class="btn btn-danger">Hapus</button></a>
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
