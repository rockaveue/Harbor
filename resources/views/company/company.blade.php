{{-- B180910044 Battushig --}}
@extends('layouts.admin')
@section('content')
    @isset($company)
        @php
            // print_r($company);
            // print_r($history)
        @endphp
    <label for="" class="block text-gray-700 text-xl font-bold mb-2">Компанийн мэдээлэл</label>
    <table class="mx-auto max-w-4xl w-full whitespace-nowrap rounded-lg bg-white divide-y divide-gray-300 overflow-hidden">
        <tr class="text-gray-600 text-left">
            <td class="font-bold text-sm uppercase px-6 py-4">Компанийн дугаар</td>
            <td class="font-semibold text-sm uppercase px-6 py-4">{{$company->id}}</td>
        </tr>
        <tr class="text-gray-600 text-left">
            <td class="font-bold text-sm uppercase px-6 py-4">Компанийн нэр</td>
            <td class="font-semibold text-sm uppercase px-6 py-4">{{$company->company_name}}</td>
        </tr>
        <tr class="text-gray-600 text-left">
            <td class="font-bold text-sm uppercase px-6 py-4">Холбогдох хүн</td>
            <td class="font-semibold text-sm uppercase px-6 py-4">{{$company->contact_person}}</td>
        </tr>
        <tr class="text-gray-600 text-left">
            <td class="font-bold text-sm uppercase px-6 py-4">Компанийн и-мэйл хаяг</td>
            <td class="font-semibold text-sm uppercase px-6 py-4">{{$company->email}}</td>
        </tr>
        <tr class="text-gray-600 text-left">
            <td class="font-bold text-sm uppercase px-6 py-4">Компанийн утас</td>
            <td class="font-semibold text-sm uppercase px-6 py-4">{{$company->phone}}</td>
        </tr>
        <tr class="text-gray-600 text-left">
            <td class="font-bold text-sm uppercase px-6 py-4">Компанийн хаяг</td>
            <td class="font-semibold text-sm uppercase px-6 py-4">{{$company->address}}</td>
        </tr>
    </table>
    @endisset
@endsection