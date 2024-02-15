@extends('template.navbar')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-lg-12">
            <div class="card ">
                <div class="card-header py-3 ">
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
                    <form action="/aktivitas/add" method="post">
                    @csrf
                    <div class="col-mb-2">
                        <label for="">Deskripsi</label>
                        <input type="text" name="deskripsi" id="" class="form-control" placeholder="Silahkan Isi">
                    </div>
                    <div class="col-mb-2">
                        <label for="">Foto</label>
                        <input type="file" name="foto" id="" class="form-control" placeholder="Silahkan Isi">
                    </div>
                    <div class="col-mb-2">
                        <label for="">Waktu</label>
                        <input type="time" name="durasi" id="" class="form-control" placeholder="Silahkan Isi">
                    </div>
                    <div class="col-mb-2">
                        <label for="">Waktu Masuk</label>
                        <select name="id_kehadiran" id="" class="form-control">
                            @foreach ($kehadiran as $item)
                            <option value="{{$item->id_kehadiran}}">{{$item->waktu_masuk}}</option>
                            @endforeach
                        </select>
                        {{-- <input type="number" name="nisn" class="form-control"> --}}
                    </div>
                    <div class="col-mb-2">
                        <button type="submit" class="btn btn-primary">SIMPAN</button>
                    </div>
                </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection