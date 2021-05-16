@extends('layouts.admin')
@section('content')
    @isset($sailor)
        @php
        
            $myrank = json_decode($ranks);
            $rank = $myrank[$sailor->rank_id - 1]->rank_name;
            // print_r($company);
            // print_r($history)
        @endphp
    <label for="" class="block text-gray-700 text-xl font-bold mb-2">Далайчны мэдээлэл</label>
    <table class="mx-auto max-w-4xl w-full whitespace-nowrap rounded-lg bg-white divide-y divide-gray-300 overflow-hidden">
        <tr class="text-gray-600 text-left">
            <td class="font-bold text-sm uppercase px-6 py-4">Ажилтны дугаар</td>
            <td class="font-semibold text-sm uppercase px-6 py-4">{{$sailor->id}}</td>
        </tr>
        <tr class="text-gray-600 text-left">
            <td class="font-bold text-sm uppercase px-6 py-4">Тушаал</td>
            <td class="font-semibold text-sm uppercase px-6 py-4">{{$rank}}</td>
        </tr>
        <tr class="text-gray-600 text-left">
            <td class="font-bold text-sm uppercase px-6 py-4">Далайчны нэр</td>
            <td class="font-semibold text-sm uppercase px-6 py-4">{{$sailor->sailor_name}}</td>
        </tr>
        <tr class="text-gray-600 text-left">
            <td class="font-bold text-sm uppercase px-6 py-4">Далайчны төрсөн огноо</td>
            <td class="font-semibold text-sm uppercase px-6 py-4">{{$sailor->date_of_birth}}</td>
        </tr>
        <tr class="text-gray-600 text-left">
            <td class="font-bold text-sm uppercase px-6 py-4">Гэрлэлтийн байдал</td>
            <td class="font-semibold text-sm uppercase px-6 py-4">{{$sailor->maritial_status}}</td>
        </tr>
        <tr class="text-gray-600 text-left">
            <td class="font-bold text-sm uppercase px-6 py-4">Далайчны хаяг</td>
            <td class="font-semibold text-sm uppercase px-6 py-4">{{$sailor->address}}</td>
        </tr>
        <tr class="text-gray-600 text-left">
            <td class="font-bold text-sm uppercase px-6 py-4">Өндөр</td>
            <td class="font-semibold text-sm uppercase px-6 py-4">{{$sailor->height}}</td>
        </tr>
        <tr class="text-gray-600 text-left">
            <td class="font-bold text-sm uppercase px-6 py-4">Жин</td>
            <td class="font-semibold text-sm uppercase px-6 py-4">{{$sailor->weight}}</td>
        </tr>
        <tr class="text-gray-600 text-left">
            <td class="font-bold text-sm uppercase px-6 py-4">Цусны бүлэг</td>
            <td class="font-semibold text-sm uppercase px-6 py-4">{{$sailor->blood_type}}</td>
        </tr>
        <tr class="text-gray-600 text-left">
            <td class="font-bold text-sm uppercase px-6 py-4">Төлөв</td>
            <td class="font-semibold text-sm uppercase px-6 py-4">{{$sailor->job_status}}</td>
        </tr>
    </table>
    @endisset
    @isset($history)
    {{-- {{$history}} --}}
    <label for="" class="block text-gray-700 text-xl font-bold mb-2">Далайчны ажлын түүх</label>
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
            <th>Гэрээний хугацаа(сараар)</th>
            <th>Гэрээ дуусах хугацаа</th>
        </tr>
        @foreach ($history as $item)
            <tr>
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