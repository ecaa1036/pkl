@extends('template.dasboard')
@section('index')
@if (session('pesan'))
<div class="alert alert-success">
  {{session('pesan')}}
</div>       
@endif
<h6 class="m-0 font-weight-bold text-primary"><a href="keterangan/create"><button class="btn btn-primary">Tambah+</button></a></h6>
<div class="table-responsive py-2">
    <table id="zero_config" class="table table-striped table-bordered no-wrap">
        <thead>
            <tr>
                <th>NO</th>
                <th>Nama</th>
                <th>Keterangan</th>
                <th>Status</th>
                <th>Aksi</th>
            </tr>
        </thead>
            @foreach ($ket as $key => $item )
                <body>
                    <tr>
                        <td>{{$key+1}}</td>
                        <td>{{$item->siswa->nama}}</td>
                        <td>{{$item->ket}}</td>
                        <td>{{$item->status}}</td>
                        <td>
                            <a href="keterangan/delete/{{$item->id_ket}}"><button class="btn btn-danger">Hapus</button></a>
                            <a href="keterangan/edit/{{$item->id_ket}}"><button class="btn btn-success">Edit</button></a>
                        </td>
                    </tr>
                </body>
            @endforeach
    </table>
</div>
@endsection