@extends('template.dasboard')
@section('index')
        
                        <div class="text-center">
                            <h2>INPUT DATA Kelas</h2>
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
                        <form action="/kelas/add" method="post">
                        @csrf
                        <div class="col-mb-2">
                            <label for="">Nama Kelas</label>
                            <input type="text" name="kelas" id="" class="form-control" placeholder="Silahkan Isi">
                        </div>
                        <div class="col-mb-2">
                            <button type="submit" class="btn btn-primary">SIMPAN</button>
                        </div>
                    </form>
                    </div>
               
@endsection