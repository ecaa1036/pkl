@extends('template.navbar')
@section('content')
        
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="card ">
                    <div class="card-header py-3 ">
                        <div class="text-center">
                            <h2>INPUT DATA</h2>
                            @if ($errors->any())
                            <div class="alert alert-danger">
                                @foreach ($errors()->all() as $item)
                                    {{$item}}
                                @endforeach
                            </div>
                                
                            @endif
                        </div>
                        <form action="/industri/add" method="post">
                        @csrf
                        <div class="text-center">
                            
                        </div>
                        <div class="col-mb-2">
                            <label for="">Nama Industri</label>
                            <input type="text" name="nama_industri" id="" class="form-control" placeholder="Silahkan Diisi">
                        </div>
                        <div class="col-mb-2">
                            <label for="">Pemilik Industri</label>
                            <input type="text" name="pemilik_industri" id="" class="form-control" placeholder="Silahkan Diisi">
                        </div>
                        <div class="col-mb-2">
                            <label for="">Alamat Industri</label>
                            <input type="text" name="alamat_industri" id="" class="form-control" placeholder="Silahkan Diisi">
                        </div>
                        <div class="col-mb-2">
                            <label for="">Nohp Industri</label>
                            <input type="number" name="nohp_industri" id="" class="form-control" placeholder="Silahkan Diisi">
                        </div>
                        <div class="col-mb-2">
                            <label for="">Username</label>
                            <select name="id_user" id="" class="form-control">
                                @foreach ($user as $item )
                                <option value="{{$item->id_user}}">{{$item->username}}</option>
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