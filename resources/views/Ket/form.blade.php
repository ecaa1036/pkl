@extends('template.dasboard')
@section('index')
<div class="text-center">
    <h2>INPUT DATA User</h2>
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
    <form action="/keterangan/add" method="post">
    @csrf
    <div class="col-mb-2">
        <label for="">Keterangan</label>
        <input type="text" name="ket" id="" class="form-control">
    </div>
    <div class="col-mb-2">
        <label for="">Status</label>
        <select name="status" id="" class=" form-control">
            <option value="sakit">Sakit</option>
            <option value="ijin">Ijin</option>
            <option value="alpa">Alfa</option>
        </select>
    </div>
    <div class="col-mb-2">
        <label for="">Nama</label>
        <select name="nisn" id="" class="form-control">
            @foreach ($siswa as $item)
            <option value="{{$item->nisn}}">{{$item->nama}}</option>
                
            @endforeach
        </select>
    </div>
    <div class="col-mb-2">
        <button class="btn btn-primary" type="submit">Simpan</button>
    </div>
    </form>
</div>
@endsection