@extends('template.navbar')
@section('content')
    
<div class="container">
    <div class="row">
        <div class="col">
            <div class="card ">
                <div class="card-header py-3 ">
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
                        <form action="/user/add" method="post">
                        @csrf
                        <div class="col-mb-2">
                            <label for="">Username</label>
                            <input type="text" name="username" id="" class="form-control" placeholder="Silahkan Isi">
                        </div>
                        <div class="col-mb-2">
                            <label for="">Password</label>
                            <input type="password" name="password" id="" class="form-control" placeholder="Silahkan Isi">
                        </div>
                        <div class="col-mb-2">
                            <label for="">Level</label>
                            <select name="level" id="" class="form-control">
                                <option value="admin">Admin</option>
                                <option value="siswa">Siswa</option>
                                <option value="pemonitoring">Pemonitoring</option>
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