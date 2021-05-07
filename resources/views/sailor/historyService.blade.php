@extends('layouts.admin')
@section('content')
@php
$location = 'http://127.0.0.1:8000/';
@endphp
@isset($history)
{{-- {{$history}} --}}
<table id="mytable">
    <tr>
        <th>#</th>
        <th>sailor</th>
        <th>rank</th>
        <th>vessel</th>
        <th>sign on date</th>
        <th>sign on port </th>
        <th>sign off date </th>
        <th>sign off port</th>
        <th>contract period</th>
        <th>contract end</th>
    </tr>
    @foreach ($history as $item)
        <tr onclick="window.location='{{$location}}sailors/{{$item->sailor_id}}';">
            <td>{{$item->id}}</td>
            <td>{{$item->sailor_id}}</td>
            <td>{{$item->rank_id }}</td>
            <td>{{$item->vessel_id }}</td>
            <td>{{$item->sign_on_date}}</td>
            <td>{{$item->sign_on_port}}</td>
            <td>{{$item->sign_off_date	}}</td>
            <td>{{$item->sign_off_port}}</td>
            <td>{{$item->contract_period}}</td>
            <td>{{$item->contract_end_date}}</td>
        </tr>
    @endforeach
</table>
@endisset
@endsection