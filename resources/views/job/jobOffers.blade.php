{{-- B180910062 Dulguun --}}
@extends('layouts.admin')
@section('header')
    <h1>Идэвхтэй ажлын байрууд</h1>
@endsection
@section('content')
    @php
    $location = 'http://127.0.0.1:8000/';
    @endphp
    <table id="mytable">
        <tr>
            <th>#</th>
            <th>Company</th>
            <th>Rank</th>
            <th>Усан онгоц</th>
            <th>Хугацаа</th>
            <th>Сүүлийн хугацаа</th>
            <th>Төлөв</th>
        </tr>
        @foreach ($jobs as $item)
            <tr onclick="window.location='{{$location}}ajluud/{{$item->id}}';">
                <td>{{$item->id}}</td>
                <td>{{($item->company_id) ? 'MVL' : ''}}</td>
                <td>{{($item->rank_id == 1) ? 'гишүүн' : 'хоёрдугаар офицер'}}</td>
                <td>{{($item->vessel_id == 1) ? 'Saint Rose' : 'San Jose'}}</td>
                <td>{{$item->contract_period}}</td>
                <td>{{$item->contract_end_date}}</td>
                <td>{{($item->state == 1)?'Идэвхтэй':'Идэвхгүй'}}</td>
            </tr>
        @endforeach
    </table>
@endsection