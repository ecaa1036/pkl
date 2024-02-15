@extends('template.navbar')
@section('content')
        
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="card ">
                    <div class="card-header py-3 ">
                        <div class="text-center">
                            <h2>INPUT DATA MONITORING</h2>
                        @if ($errors->any())
                                <div class="alert alert-danger">
                                    <ul>
                                    @foreach ($errors->all() as $item)
                                        {{$item}}
                                    @endforeach
                                    </ul>
                                </div>
                        @endif
                        </div>
                        <form action="/monitoring/add" method="post">
                        @csrf
                        <div class="col-mb">
                            <label for="">Guru</label>
                            <select name="id_guru" id="" class="form-control">
                                @foreach ($guru as $item)
                                    <option value="{{$item->id_guru}}">{{$item->nama_guru}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-mb">
                            <label for="">Nama Siswa</label>
                            <select name="nisn" id="" class="form-control">
                                @foreach ($siswa as $item)
                                <option value="{{$item->nisn}}">{{$item->nama}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-mb">
                            <label for="">Industri</label>
                            <select name="id_industri" id="" class="form-control">
                                @foreach ($industri as $item)
                                    <option value="{{$item->id_industri}}">{{$item->nama_industri}}</option>
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