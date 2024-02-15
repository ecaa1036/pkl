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
                        <form action="/siswa/add" method="post">
                        @csrf
                        <div class="col-mb-2">
                            <label for="">Nisn</label>
                            <input type="number" name="nisn" id="" class="form-control" placeholder="Silahkan Isi">
                        </div>
                        <div class="col-mb-2">
                            <label for="">Nama</label>
                            <input type="text" name="nama" id="" class="form-control" placeholder="Silahkan Isi">
                        </div>
                        <div class="col-mb-2">
                            <label for="">No Hp</label>
                            <input type="number" name="nohp" id="" class="form-control" placeholder="Silahkan Isi">
                        </div>
                        <div class="col-mb-2">
                            <label for="">Alamat</label>
                            <input type="text" name="alamat" id="" class="form-control" placeholder="Silahkan Isi">
                        </div>
                        <div class="col-mb-2">
                            <label for="">Username</label>
                            <select name="id_user" id="" class="form-control">
                                <option value="">--Pilih Username</option>
                                @foreach ($user as $item)
                                <option value="{{$item->id_user}}">{{$item->username}}</option>
                                    
                                @endforeach
                            </select>
                            {{-- <input type="username" name="username" class="form-control" placeholder="Silahkan Isi"> --}}
                        </div>
                        <div class="col-mb-2">
                            <label for="">Kelas</label>
                            <select name="id_kelas" id="" class="form-control">
                                <option value="">--Pilih Kelas</option>
                                @foreach ($kelas as $item)
                                <option value="{{$item->id_kelas}}">{{$item->kelas}}</option>
                                    
                                @endforeach
                            </select>
                            {{-- <input type="text" name="kelas" class="form-control" placeholder="Silahkan Isi"> --}}
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