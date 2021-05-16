{{-- B18090062 Dulguun --}}
@extends('layouts.admin')
@section('header')
    {{-- <table>
        <tr>
            <th>#</th>
            <th>Company</th>
            <th>Rank</th>
            <th>Хугацаа</th>
            <th>Сүүлийн хугацаа</th>
            <th>Төлөв</th>
        </tr>
        @foreach ($job as $item)
            <tr>
                <td>{{$item->id}}</td>
                <td>{{$item->company_id}}</td>
                <td>{{$item->rank_id}}</td>
                <td>{{$item->vessel_id}}</td>
                <td>{{$item->contract_period}}</td>
                <td>{{$item->contract_end_date}}</td>
                <td>{{($item->state == 1)?'Идэвхтэй':'Идэвхгүй'}}</td>
            </tr>
        @endforeach
    </table> --}}
@endsection
@section('content')
    @php
    $location = 'http://127.0.0.1:8000/';
    $myrank = json_decode($ranks);
    @endphp
    
    <label class="block text-gray-700 text-sm font-bold mb-2"> Хуваарилагдах боломжтой болон боломжгүй ажилчид</label>
    <table id="mytable">
        <tr>
            <th>#</th>
            <th>Нэр</th>
            <th>Зэрэг</th>
            <th>Төлөв</th>
        </tr>
        @foreach ($sailors as $item)
        @php
            $rank = $myrank[$item->rank_id - 1]->rank_name;
        @endphp
            <tr>
                <td>{{$item->id}}</td>
                <td>{{$item->sailor_name}}</td>
                <td>{{$rank}}</td>
                <td>{{($item->job_status == 1 || $item->job_status == 4 || $item->job_status == 5)? 'Боломжтой' : 'Боломжгүй'}}</td>
            </tr>
        @endforeach
    </table>
    <form action="" method="post">
        <table>
            {{ csrf_field() }}
            Ажилчны id-г оруулна уу
            <tr>
                <td>id: </td>
                <td><input type="text" name="sailorId" class="border py-2 px-3 text-grey-darkes"></td>
            </tr>
            <tr><td><button type="submit" class="bg-blue-500     hover:bg-blue-dark text-white font-bold py-2 px-4 rounded">Ажилд оноох</button></td></tr>
        </table>
    </form>
    @if (session('success'))
        {{session('success')}}
    @endif
    @if(session()->has('message'))
    <div class="alert alert-success">
        {{ session()->get('message') }}
    </div>
@endif
@endsection