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
<body onload="displayTime()">
<div class="text-center">
    <h1 id="jam"></h1>
</div>
<!-- Form inputan absensi siswa -->
@if (isset($siswa) && $siswa->absen)
    <form action="/absen/tmb" method="post">
        @csrf
        <div class="col-mb-2">
            <label for="">Token Masuk</label>
            <input type="text" name="token_masuk" class="form-control" placeholder="Masukkan Token Masuk">
        </div>
        <div class="col-mb-2">
            <label for="">Nama</label>
            {{-- <input type="text" name="nisn" value="{{$siswa->nama}}" class="form-control" id=""> --}}
            <select name="nisn" id="" class="form-control">
                @foreach ($siswa as $item)
                    <option value="{{$item->nisn}}">{{$item->nama}}</option>
                @endforeach
            </select>
        </div>
        <div class="col-mb-2">
            <button type="submit" class="btn btn-primary">SIMPAN</button>
        </div>
    </form>
@elseif (isset($siswa) && $siswa->tidak_masuk)
    <form action="/absen/tmb" method="post">
        @csrf
        <div class="col-mb-2">
            <label for="">Nama</label>
            {{-- <input type="text" name="nisn" value="{{$siswa->nama}}" class="form-control" id=""> --}}
            <select name="nisn" id="" class="form-control">
                @foreach ($siswa as $item)
                    <option value="{{$item->nisn}}">{{$item->nama}}</option>
                @endforeach
            </select>
            <div class="col-mb-2">
                <label for="">Keterangan</label>
                <select name="ket" id="" class="form-control">
                    <option value="ijin">Ijin</option>
                    <option value="sakit">Sakit</option>
                    <option value="alfa">Alfa</option>
                </select>
            </div>
        </div>
        <div class="col-mb-2">
            <button type="submit" class="btn btn-primary">SIMPAN</button>
        </div>
    </form>
@elseif (isset($siswa) && $siswa->pulang)
    <form action="/absen/tmb" method="post">
        @csrf
        <div class="col-mb">
            <label for="">Token Keluar</label>
            <input type="text" name="token_keluar" id="" class="form-control">
        </div>
        <div class="col-mb-2">
            <button type="submit" class="btn btn-primary">Keluar</button>
        </div>
    </form>
@else
    <p>Siswa tidak ditemukan.</p>
@endif

@endsection
