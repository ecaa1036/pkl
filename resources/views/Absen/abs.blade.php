@extends('template.dasboard')
@section('index')

<form action="/absen/add" method="post">
    @csrf
    <input type="hidden" name="token_masuk" value="{{ $industri->first()->token_masuk }}">    <button class="btn btn-info" type="submit">Masuk</button>
    <!-- other form fields -->
</form>

@endsection