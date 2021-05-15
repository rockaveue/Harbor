@extends('layouts.admin')
@section('header')
    Далайчны мэдээлэл засварлах хэсэг
@endsection
@section('content')
    @isset($sailor)
        {{$sailor}}
    @endisset
@endsection