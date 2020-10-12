@extends('layout.base')
@section('title','アップロードの基本')
@section('main')
<form method="POST" action="/ctrl/uploadfile" enctype="multipart/form-data">
    @csrf
    <input id="upfile" name="upfile" type="file" />
    <input type="submit" value="送信" />
    <p>{{$result}}</p>
</form>
@endsection