<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:ital,wght@0,400..900;1,400..900&display=swap"
        rel="stylesheet">

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])

</head>

<body class="font-sans antialiased">
    @if (Auth::check())
        @include('utilitis.navbar')
    @else
        @include('utilitis.home_navbar')
    @endif
    <div class="min-h-screen bg-gray-100 p-6">
        <!-- Page Content -->
        <h1 class="font-bold text-xl text-[#16233C]">Hello, people.! This is </h1>
        <br>
        <div class="text-4xl font-semibold text-[#375695] text-center font-serif">Webhook integration with facebook
            Graph API for <br>lead collection.</div>
    </div>
</body>

</html>
