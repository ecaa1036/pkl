@extends('template.dasboard')
@section('index')
<div class="text-center">
    <h1>Daftar Absen</h1>
</div>
<a href="absen/create"><button class="btn btn-primary">Tambah+</button></a>
<table>
    <tr>
        {{-- <th>No</th> --}}
        <th>Token Masuk</th>
    </tr>
    @foreach ($industri as  $item )
        <tr>
            {{-- <td>{{$key+1}}</td> --}}
            <td>{{$item->token_masuk}}</td>
        </tr>
    @endforeach
</table>
@endsection