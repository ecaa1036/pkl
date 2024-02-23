
@extends('template.dasboard')
@section('index')

    <div id="content-wrapper" class="d-flex flex-column">
      <div id="content">
        @if (session('pesan'))
                <div class="alert alert-success">
                    {{session('pesan')}}
                </div>
          @endif 
           <div class="container-fluid">
            <div class="row">
              <h4 class="card-title">Data Siswa</h4>
              <div class="col-12">      
                    <h6 class="m-0 font-weight-bold text-primary"><a href="siswa/create"><button class="btn btn-primary">Tambah+</button></a></h6>
                  </div>
                  {{-- <h6 class="card-subtitle">DataTables has most features enabled by default, so all you
                      need to do to use it with your own tables is to call the construction
                      function:<code> $().DataTable();</code>. You can refer full documentation from here
                      <a href="https://datatables.net/">Datatables</a></h6> --}}
                  <div class="table-responsive py-2">
                    <table id="zero_config" class="table table-striped table-bordered no-wrap">
                      <thead>

                        <tr>
                            <th>No</th>
                            <th>Nisn</th>
                            <th>Nama</th>
                            <th>No Hp</th>
                            <th>Alamat</th>
                            <th>Username</th>
                            <th></th>
                            <th>Kelas</th>
                            <th>Aksi</th>
                        </tr>
                      </thead>
                    <tbody>
                        @foreach ($siswa as $key => $item )
                        <tr>
                            <td>{{$key+1}}</td>
                            <td>{{$item->nisn}}</td>
                            <td>{{$item->nama}}</td>
                            <td>{{$item->nohp}}</td>
                            <td>{{$item->alamat}}</td>
                            <td>{{$item->user->username}}<td>
                            <td>{{$item->kelas->kelas}}</td>
                            <td>
                                    <a href="/siswa/delete/{{$item->nisn}}"><button class="btn btn-danger">Hapus</button></a>
                                <a href="/siswa/edit/{{$item->nisn}}"><button class="btn btn-info">Edit</button></a>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
  @endsection
