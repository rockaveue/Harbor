<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/fontawesome.min.css">
        
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
        {{-- <link rel="stylesheet" href="{{ asset('font-awesome/css/font-awesome.min.css')}}">
         --}}
        <!-- Styles -->
        <link rel="stylesheet" href="{{ asset('css/app.css') }}">

        <!-- Scripts -->
        <script src="{{ asset('js/app.js') }}" defer></script>
    </head>
    <body class="font-sans antialiased">
                <!-- This example requires Tailwind CSS v2.0+ -->
        <x-app-layout>

            <x-slot name="header">
                @yield('header')
            </x-slot>
            <main>
                <div class="max-w-7xl mx-auto py-6 sm:px-6 lg:px-8">
                @yield('content')
                <!-- /End replace -->
                </div>
            </main>
        </x-app-layout>
    </body>
</html>
