@extends('template.navbar')
@section('content')
    
<div class="container">
    <div class="row">
        <div class="col">
            <div class="card ">
                <div class="card-header py-3 ">
                    <div class="text-center">
                        <h2>INPUT DATA GURU</h2>
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
                    <form action="/guru/update/{{$guru->id_guru}}" method="post">
                    @csrf
                    <div class="col-mb-2">
                        <label for="">Nama Guru</label>
                        <input type="text" name="nama_guru" id="" value="{{$guru->nama_guru}}" class="form-control" placeholder="Silahkan Isi">
                    </div>
                    <div class="col-mb-2">
                        <label for="">No Hp</label>
                        <input type="number" name="nohp_guru" id="" value="{{$guru->nohp_guru}}" class="form-control" placeholder="Silahkan Isi">
                    </div>
                    <div class="col-mb-2">
                        <label for="">Username</label>
                        <select name="id_user" id="" class="form-control">
                            @foreach ($user as $item)
                            <option value="{{$item->id_user}}" selected>{{$item->username}}</option>
                        
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
