@extends('layouts.admin')
@section('header')
    <h1>Далайчны төлөв өөрчлөх</h1>
@endsection
@section('content')
    @isset ($sailors)
        <table id="mytable">
            <tr>
                <th>#</th>
                <th>Нэр</th>
                <th>Зэрэг</th>
                <th>Төлөв</th>
            </tr>
            @foreach ($sailors as $item)
                <tr>
                    <td>{{$item->id}}</td>
                    <td>{{$item->sailor_name}}</td>
                    <td>{{$item->rank_id}}</td>
                    <td>{{$item->job_status}}</td>
                </tr>
            @endforeach
        </table>
    @endisset
@endsection