@extends('template.dasboard')
@section('index')

                        <div class="text-center">
                            <h2>UPDATE DATA KEHADIRAN</h2>
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
                        <form action="/kehadiran/update/{{$kehadiran->id_kehadiran}}" method="post">
                        @csrf
                        <div class="col-mb-2">
                            <label for="">Tanggal</label>
                            <input type="date" name="tgl_kehadiran" id="" value="{{$kehadiran->tgl_kehadiran}}" class="form-control" placeholder="Silahkan Isi">
                        </div>
                        <div class="col-mb-2">
                            <label for="">Waktu Masuk</label>
                            <input type="time" name="waktu_masuk" id="" value="{{$kehadiran->waktu_masuk}}"  class="form-control" placeholder="Silahkan Isi">
                        </div>
                        <div class="col-mb-2">
                            <label for="">Waktu Pulang</label>
                            <input type="time" name="waktu_pulang" id="" value="{{$kehadiran->waktu_pulang}}" class="form-control" placeholder="Silahkan Isi">
                        </div>
                        <div class="col-mb-2">
                            <label for="">Keterangan</label>
                            <select name="ket" id="" class=" form-control">
                                @if ($kehadiran->ket == 'sakit')
                                    <option value="sakit" selected>Sakit</option>
                                    <option value="ijin">Ijin</option>
                                    <option value="alpa">Alfa</option>
                                @elseif ($kehadiran->ket == 'ijin')
                                    <option value="sakit">Sakit</option>
                                    <option value="ijin" selected>Ijin</option>
                                    <option value="alpa">Alfa</option>
                                @else
                                    <option value="sakit">Sakit</option>
                                    <option value="ijin">Ijin</option>
                                    <option value="alpa" selected>Alfa</option>
                                @endif
                            </select>
                            {{-- <input type="file" name="foto" id="" class="form-control" placeholder="Silahkan Isi"> --}}
                        </div>
                        <div class="col-mb-2">
                            <label for="">Nama</label>
                            <select name="nisn" id="" class="form-control">
                                @foreach ($siswa as $item)
                                <option value="{{$item->nisn}}">{{$item->nama}}</option>
                                @endforeach
                            </select>
                            {{-- <input type="number" name="nisn" class="form-control"> --}}
                        </div>
                        <div class="col-mb-2">
                            <button type="submit" class="btn btn-primary">UPDATE</button>
                        </div>
                    </form>
                
    </div>
@endsection