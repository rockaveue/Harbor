@extends('layouts.admin')
@section('header')
    Далайчдын мэдээлэл
@endsection
@section('content')
@php
    $location = 'http://127.0.0.1:8000/';
@endphp
    @isset($sailors)
        <table id="mytable">
            <tr>
                <th>#</th>
                <th>Төлөв</th>
                <th>Нэр</th>
                <th>Тушаал</th>
                <th>Төрсөн огноо</th>
                <th>Гэрлэлт</th>
                <th>Хаяг</th>
                <th>Өндөр</th>
                <th>Жин</th>
                <th>Гутлын размер</th>
                <th>Цусны төрөл</th>
            </tr>
            @foreach ($sailors as $item)
            @php
                if ($item->rank_id == 1){
                    $rank = 'гишүүн';
                } else if($item->rank_id == 2){
                    $rank = '2-р офицер';
                }
            @endphp
                <tr>
                    <td>{{$item->id}}</td>
                    <td>{{$item->job_status}}</td>
                    <td>{{$item->sailor_name}}</td>
                    <td>{{$rank}}</td>
                    <td>{{$item->date_of_birth}}</td>
                    <td>{{$item->maritial_status}}</td>
                    <td>{{$item->address}}</td>
                    <td>{{$item->height}}</td>
                    <td>{{$item->weight}}</td>
                    <td>{{$item->shoe_size}}</td>
                    <td>{{$item->blood_type}}</td>
                </tr>
            @endforeach
        </table>
    @endisset
@endsection