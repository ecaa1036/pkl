@extends('template.navbar')
@section('content')
        
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="card ">
                    <div class="card-header py-3 ">
                        <div class="text-center">
                            <h2>EDIT DATA</h2>
                            @if ($errors->any())
                            <div class="alert alert-danger">
                                @foreach ($errors()->all() as $item)
                                    {{$item}}
                                @endforeach
                            </div>
                                
                            @endif
                        </div>
                        <form action="/industri/update/{{$industri->id_industri}}" method="post">
                        @csrf
                        <div class="text-center">
                            
                        </div>
                        <div class="col-mb-2">
                            <label for="">Nama Industri</label>
                            <input type="text" name="nama_industri" id="" value="{{$industri->nama_industri}}" class="form-control" placeholder="Silahkan Diisi">
                        </div>
                        <div class="col-mb-2">
                            <label for="">Pemilik Industri</label>
                            <input type="text" name="pemilik_industri" id="" value="{{$industri->pemilik_industri}}" class="form-control" placeholder="Silahkan Diisi">
                        </div>
                        <div class="col-mb-2">
                            <label for="">Alamat Industri</label>
                            <input type="text" name="alamat_industri" id="" value="{{$industri->alamat_industri}}" class="form-control" placeholder="Silahkan Diisi">
                        </div>
                        <div class="col-mb-2">
                            <label for="">Nohp Industri</label>
                            <input type="number" name="nohp_industri" id="" value="{{$industri->nohp_industri}}" class="form-control" placeholder="Silahkan Diisi">
                        </div>
                        <div class="col-mb-2">
                            <label for="">Username</label>
                            <select name="id_user" id="" class="form-control">
                                @foreach ($user as $item )
                                <option value="{{$item->id_user}}" selected>{{$item->username}}</option>
                                @endforeach
                            </select>
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