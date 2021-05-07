{{-- B180910044 --}}
@extends('layouts.admin')
@section('content')
<div class="flex flex-col w-full max-w-ws justify-center">
    <form action="" method="post" class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4">
        {{ csrf_field() }}
        <div class="mb-4">
            <label class="block text-gray-700 text-sm font-bold mb-2"   for="name">Нэр</label>
            <input class="shadow appearance-none border rounded w-1/2 py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"  type="text" name="name" id="">
        </div>
        <div class="mb-4">
        <label class="block text-gray-700 text-sm font-bold mb-2"  for="">Албан тушаал</label>
        <select name="rank" id="" class="form-select mt-1 block w-1/2">
            <option value="1" selected>Гишүүн</option>
            <option value="2">1-р офицер</option>
            <option value="3">2-р офицер</option>
            <option value="4"></option>
            <option value="5"></option>
        </select>
        </div>
        
        <div class="mb-4">
        <label class="block text-gray-700 text-sm font-bold mb-2"  for="">Төрсөн өдөр</label>
        <input class="shadow appearance-none border rounded w-1/2 py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"  type="date" name="birthDate" id="">
    </div>
        <div class="mb-4">
        {{-- marital status --}}
        <label class="block text-gray-700 text-sm font-bold mb-2"  for="">Гэрлэлтийн байдал</label>
        <select name="marital" id="" class="form-select mt-1 block w-1/2">
            <option value="Ганц бие" selected>Ганц бие</option>
            <option value="Гэрлэсэн">Гэрлэсэн</option>
            <option value="Бусад">Бусад</option>
        </select>
    </div>
        <div class="mb-4">
        <label class="block text-gray-700 text-sm font-bold mb-2"  for="">Гэрийн хаяг</label>
        <input class="shadow appearance-none border rounded w-1/2 py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"  type="text" name="homeAddress" id="">
    </div>
        <div class="mb-4">
        <label class="block text-gray-700 text-sm font-bold mb-2"  for="">Өндөр</label>
        <input class="shadow appearance-none border rounded w-1/2 py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"  type="number" name="height" id="">
    </div>
        <div class="mb-4">
        <label class="block text-gray-700 text-sm font-bold mb-2"  for="">Жин</label>
        <input class="shadow appearance-none border rounded w-1/2 py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"  type="number" name="weight" id="">
    </div>
        <div class="mb-4">
        <label class="block text-gray-700 text-sm font-bold mb-2"  for="">Гутлын размер</label>
        <input class="shadow appearance-none border rounded w-1/2 py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"  type="number" name="shoeSize" id="">
    </div>
        <div class="mb-4">
        <label class="block text-gray-700 text-sm font-bold mb-2"  for="">Цусны бүлэг</label>
        <input class="shadow appearance-none border rounded w-1/2 py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"  type="text" name="bloodType" id="">
    </div>
        <div class="mb-4">
        <input class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline"   type="submit" value="Хадгалах">

    </form>
</div>
@if(session()->has('message'))

<div class="mt-4"></div>
<div class="flex justify-center items-center m-1 font-medium py-1 px-2 bg-white rounded-md text-green-700 bg-green-100 border border-green-300 ">
    <div slot="avatar">
        <svg xmlns="http://www.w3.org/2000/svg" width="100%" height="100%" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-check-circle w-5 h-5 mx-2">
            <path d="M22 11.08V12a10 10 0 1 1-5.93-9.14"></path>
            <polyline points="22 4 12 14.01 9 11.01"></polyline>
        </svg>
    </div>
    <div class="text-xl font-normal  max-w-1/2 flex-initial">
        
    {{ session()->get('message') }}</div>
    <div class="flex flex-auto flex-row-reverse">
        <div>
            <svg xmlns="http://www.w3.org/2000/svg" width="100%" height="100%" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-x cursor-pointer hover:text-green-400 rounded-full w-5 h-5 ml-2">
                <line x1="18" y1="6" x2="6" y2="18"></line>
                <line x1="6" y1="6" x2="18" y2="18"></line>
            </svg>
        </div>
    </div>
</div>
@endif
@endsection