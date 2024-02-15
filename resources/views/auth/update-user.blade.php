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
                        <form action="/user/update/{{$user->id_user}}" method="post">
                        @csrf
                        <div class="col-mb-2">
                            <label for="">Username</label>
                            <input type="text" name="username" id="" class="form-control" value="{{$user->username}}" placeholder="Silahkan Isi">
                        </div>
                        <div class="col-mb-2">
                            <label for="">Password</label>
                            <input type="text" name="password" id="" class="form-control" value="{{$user->password}}" placeholder="Silahkan Isi">
                        </div>
                        <div class="col-mb-2">
                            <label for="">Level</label>
                            <select name="level" id="" class="form-control">
                                @if(Auth::user()->level == 'admin')
                                <option value="admin" selected>Admin</option>
                                <option value="siswa">Siswa</option>
                                <option value="pemonitoring">Pemonitoring</option>
                                @elseif (Auth::user()->level == 'siswa')
                                <option value="admin">Admin</option>
                                <option value="siswa" selected>Siswa</option>
                                <option value="pemonitoring">Pemonitoring</option>
                                @else
                                <option value="admin">Admin</option>
                                <option value="siswa">Siswa</option>
                                <option value="pemonitoring" selected>Pemonitoring</option>
                                @endif
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