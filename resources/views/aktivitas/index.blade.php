@extends('template.dasboard')
@section('index')
            
<div id="content-wrapper" class="d-flex flex-column">
    <div id="content">
      @if (session('pesan'))
              <div class="alert alert-success">
                  {{session('pesan')}}
              </div>       
      @endif

                  <h6 class="m-0 font-weight-bold text-primary"><a href="aktivitas/create"><button class="btn btn-primary">Tambah+</button></a></h6>
                </div>
                <div class="table-responsive py-2">
                  <table id="zero_config" class="table table-striped table-bordered no-wrap">
                    <thead>
                      <tr>
                          <th>No</th>
                          <th>Deskripsi</th>
                          <th>Foto</th>
                          <th>Waktu</th>
                          <th>Waktu Mauk</th>
                          <th>Aksi</th>
                      </tr>
                  </thead>
                  <tbody>
                      @foreach ($aktivitas as $key => $item )
                      <tr>
                          <td>{{$key+1}}</td>
                          <td>{{$item->deskripsi}}</td>
                          <td>

                              <img src="/storage/{{ $item->foto }}" width="50" alt="">
                          </td>
                          <td>{{$item->durasi}}</td>
                          <td>{{$item->kehadiran->waktu_masuk}}</td>
                          <td>
                            <a href="aktivitas/edit/{{$item->id_aktivitas}}"><button class="btn btn-info">Edit</button></a>
                            <a href="aktivitas/delete/{{$item->id_aktivitas}}"><button class="btn btn-danger">Delete</button></a>
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