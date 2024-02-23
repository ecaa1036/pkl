@extends('template.dasboard')
@section('index')
<script type="text/javascript">
    function displayTime(){
        var clientTime = new Date();
        var time=new Date(clientTime.getTime());
        var sh=time.getHours().toString();
        var sm=time.getMinutes().toString();
        var ss=time.getSeconds().toString();
        document.getElementById("jam").innerHTML = (sh.length==1?"0"+sh:sh)+":"+(sm.length==1?"0"+sm:sm)+":"+(ss.length==1?"0"+ss:ss);
        document.getElementById("jaminput").value = (sh.length==1?"0"+sh:sh)+":"+(sm.length==1?"0"+sm:sm)+":"+(ss.length==1?"0"+ss:ss);
    }
    </script>
   <body onload="setInterval('displayTime()', 1000);">
    <div class="text-center">
      <h1 id="jam"></h1>
    </div>
    {{-- <div id="content-wrapper" class="d-flex flex-column"> --}}
      <div id="content">
        @if (session('pesan'))
        <div class="alert alert-success">
          {{session('pesan')}}
        </div>       
        @endif
        <h6 class="m-0 font-weight-bold text-primary"><a href="absen/index"><button class="btn btn-primary">Tambah+</button></a></h6>
        <div class="table-responsive py-2">
            <table id="zero_config" class="table table-striped table-bordered no-wrap">
              <thead>
                <tr>
                    <th>No</th>
                    <th>Tanggal</th>
                    <th>Waktu Masuk</th>
                    <th>Nama Siswa</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($hadir as $key => $item )
                <tr>
                    <td>{{$key+1}}</td>
                    <td>{{$item->tgl_kehadiran}}</td>
                    <td>{{$item->waktu_masuk}}</td>
                    <td>{{$item->siswa->nama}}</td>
                    {{-- <td>
                      <a href="kehadiran/edit/{{$item->id_kehadiran}}"><button class="btn btn-info">Edit</button></a>
                      <a href="kehadiran/delete/{{$item->id_kehadiran}}"><button class="btn btn-danger">Delete</button></a>
                    </td> --}}
                </tr>
            @endforeach
            </tbody>
          </table>
@endsection