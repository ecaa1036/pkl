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

                        <div class="text-center">
                            <h2>INPUT DATA KEHADIRAN</h2>
                            @if ($errors->any())
                            <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $item )
                                    <li>
                                        {{$item}}
                                    </li>
                                @endforeach
                            </ul>
                                
                            @endif
                        </div>
                        <form action="/kehadiran/add" method="post">
                        @csrf
                        {{-- <div class="col-mb-2">
                            <label for="">Tanggal</label>
                            <input type="date" name="tgl_kehadiran" id="" class="form-control" placeholder="Silahkan Isi">
                        </div> --}}
                        {{-- <div class="col-mb-2">
                            <label for="">Waktu Masuk</label>
                            <input type="time" name="waktu_masuk" id="" class="form-control" placeholder="Silahkan Isi">
                        </div>
                        <div class="col-mb-2">
                            <label for="">Waktu Pulang</label>
                            <input type="time" name="waktu_pulang" id="" class="form-control" placeholder="Silahkan Isi">
                        </div> --}}
                        @php
                            $cek = count($siswa);
                        @endphp

                        @if ($cek > 0)
                            <div class="col-mb-2">
                                <label for="">Token Masuk</label>
                                <input type="text" name="token_masuk" id="" class="form-control" placeholder="Silahkan Isi">
                            </div>
                            <div class="col-mb-2">
                                <label for="">Token Keluar</label>
                                <input type="text" name="token_keluar" id="" class="form-control" placeholder="Silahkan Isi">
                            </div>
                            <div class="col-mb-2">
                                <button type="submit" class="btn btn-primary">SIMPAN</button>
                            </div>
                            
                        <div class="col-mb-2">
                            <label for="">Nama</label>
                            <select name="nisn" id="" class="form-control">
                                @foreach ($siswa as $item)
                                <option value="{{$item->nisn}}">{{$item->nama}}</option>
                                @endforeach
                            </select>
                        </div>
                            @else
                            <div class="col-mb-2">
                                <button type="submit" class="btn btn-primary">SIMPAN</button>
                            </div>
                        </form>
                    </div>
                    @endif
                
    </div>
@endsection