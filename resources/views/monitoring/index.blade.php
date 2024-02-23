@extends('template.dasboard')
@section('index')
        
    <div id="content-wrapper" class="d-flex flex-column">
      <div id="content">
        @if (session('pesan'))
                <div class="alert alert-success">
                    {{session('pesan')}}
                </div>       
        @endif

                    <h6 class="m-0 font-weight-bold text-primary"><a href="monitoring/create"><button class="btn btn-primary">Tambah+</button></a></h6>
                  </div>
                  <div class="table-responsive py-2">
                    <table id="zero_config" class="table table-striped table-bordered no-wrap">
                      <thead> 
                        <tr>
                            <th>No</th>
                            <th>Guru</th>
                            <th>Nama Siswa</th>
                            {{-- <th>Kelas</th> --}}
                            <th>Nama Industri</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($monitoring as $key => $item)
                        <tr>
                            <td>{{$key+1}}</td>
                            <td>{{$item->guru->nama_guru}}</td>
                            <td>{{$item->siswa->nama}}</td>
                            {{-- <td>{{$item->kelas->siswa->kelas}}</td> --}}
                            <td>{{$item->industri->nama_industri}}</td>
                            <td>
                                <a href="monitoring/delete/{{$item->id_monitoring}}"><button class="btn btn-danger">Delete</button></a>
                                <a href="monitoring/edit/{{$item->id_monitoring}}"><button class="btn btn-info">Edit</button></a>
                            </td>
                        </tr>
                            
                        @endforeach
                    </tbody>
                  </table>
                </div>
              </div>

  <script>
    $(document).ready(function () {
      $('#dataTable').DataTable(); // ID From dataTable 
      $('#dataTableHover').DataTable(); // ID From dataTable with Hover
    });
  </script>
@endsection
