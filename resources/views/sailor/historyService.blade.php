{{-- B180910062 Dulguun --}}
@extends('layouts.admin')
@section('header')
    Үйлчилгээний түүх харуулах хэсэг
@endsection
@section('content')
@php
$location = 'http://127.0.0.1:8000/';
@endphp
@isset($history)
{{-- {{$history}} --}}
<table id="mytable">
    <tr>
        <th>#</th>
        <th>Далайчны дугаар</th>
        <th>Албан тушаал</th>
        <th>Усан онгоц</th>
        <th>Эхэлсэн өдөр</th>
        <th>Гарсан боомт </th>
        <th>Ирсэн өдөр </th>
        <th>Ирсэн боомт</th>
        <th>Гэрээний хугацаа</th>
        <th>Гэрээ дуусах хугацаа</th>
    </tr>
    @foreach ($history as $item)
        <tr onclick="window.location='{{$location}}sailors/{{$item->sailor_id}}';">
            <td>{{$item->id}}</td>
            <td>{{$item->sailor_id}}</td>
            <td>{{$item->rank_id }}</td>
            <td>{{$item->vessel_id }}</td>
            <td>{{$item->sign_on_date}}</td>
            <td>{{$item->sign_on_port}}</td>
            <td>{{($item->sign_off_date == null) ? 'Ирээгүй' : $item->sign_off_date}}</td>
            <td>{{($item->sign_off_port == null) ? 'Ирээгүй' : $item->sign_off_port}}</td>
            <td>{{$item->contract_period}}</td>
            <td>{{$item->contract_end_date}}</td>
        </tr>
    @endforeach
</table>
@endisset
@endsection