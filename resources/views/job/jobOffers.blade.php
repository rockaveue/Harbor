{{-- B180910062 Dulguun --}}
@extends('layouts.admin')
@section('header')
    <h1>Идэвхтэй ажлын байрууд</h1>
@endsection
@section('content')
    @php
    $location = 'http://127.0.0.1:8000/';
    $myvessel = json_decode($vessels);
    $myrank = json_decode($ranks);
    $mycompany = json_decode($companies)
    @endphp
    <table id="mytable">
        <tr>
            <th>#</th>
            <th>Company</th>
            <th>Rank</th>
            <th>Усан онгоц</th>
            <th>Хугацаа(сараар)</th>
            <th>Сүүлийн хугацаа</th>
            <th>Төлөв</th>
        </tr>
        @foreach ($jobs as $item)
        
        @php

            $rank = $myrank[$item->rank_id - 1]->rank_name;
            // print_r($myrank[$item->rank_id - 1]);
            // print_r($item->vessel_id)
            $vessel = $myvessel[$item->vessel_id-1]->vessel_name;
            $company = $mycompany[$item->company_id-2]->company_name;
            // print_r($mycompany);
        @endphp
            <tr onclick="window.location='{{$location}}ajluud/{{$item->id}}';">
                <td>{{$item->id}}</td>
                <td>{{$company}}</td>
                <td>{{$rank}}</td>
                <td>{{$vessel}}</td>
                <td>{{$item->contract_period}}</td>
                <td>{{$item->contract_end_date}}</td>
                <td>{{($item->state == 1)?'Идэвхтэй':'Идэвхгүй'}}</td>
            </tr>
        @endforeach
    </table>
@endsection