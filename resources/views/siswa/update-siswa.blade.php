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
                        <form action="/siswa/update/{{$siswa->nisn}}" method="post">
                        @csrf
                        <div class="col-mb-2">
                            <label for="">Nisn</label>
                            <input type="number" name="nisn" id="" value="{{$siswa->nisn}}" class="form-control" placeholder="Silahkan Isi">
                        </div>
                        <div class="col-mb-2">
                            <label for="">Nama</label>
                            <input type="text" name="nama" id="" value="{{$siswa->nama}}" class="form-control" placeholder="Silahkan Isi">
                        </div>
                        <div class="col-mb-2">
                            <label for="">No Hp</label>
                            <input type="number" name="nohp" id="" value="{{$siswa->nohp}}" class="form-control" placeholder="Silahkan Isi">
                        </div>
                        <div class="col-mb-2">
                            <label for="">Alamat</label>
                            <input type="text" name="alamat" id="" value="{{$siswa->alamat}}" class="form-control" placeholder="Silahkan Isi">
                        </div>
                        <div class="col-mb-2">
                            <label for="">Username</label>
                            <select name="id_user" id="" class="form-control">
                                <option value="">--Pilih Username</option>
                                @foreach ($user as $item)
                                <option value="{{$item->id_user}}" selected>{{$item->username}}</option>
                                    
                                @endforeach
                            </select>
                            {{-- <input type="username" name="username" class="form-control" placeholder="Silahkan Isi"> --}}
                        </div>
                        <div class="col-mb-2">
                            <label for="">Kelas</label>
                            <select name="id_kelas" id="" class="form-control">
                                <option value="">--Pilih Kelas</option>
                                @foreach ($kelas as $item)
                                <option value="{{$item->id_kelas}}" selected>{{$item->kelas}}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="col-mb-2">
                            <button type="submit" class="btn btn-primary">UPDATE</button>
                        </div>
                    </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection