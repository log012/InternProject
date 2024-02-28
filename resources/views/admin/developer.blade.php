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
    {{-- <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" /> --}}

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="font-sans antialiased">
    @if (Auth::check())
        @include('utilitis.navbar')
    @else
        @include('utilitis.home_navbar')
    @endif
    <div class="min-h-screen bg-gray-100 py-6 px-10">
        <h1 class="font-bold text-xl text-[#16233C] text-center">Hello, people.! Here are the developers of the this Web
            Application
        </h1>
        <br>
        <div class="text-2xl font-semibold text-[#375695] font-serif my-3">Developers</div>
        <div class="flex flex-wrap gap-4 pb-4 text-[#16233C]">
            <div class="w-[30%]">
                <div class="bg-white py-5 rounded-lg shadow-lg">
                    <div class="flex justify-center">
                        <img src="https://dishapatel126.github.io/hosted-assets/logo.png" alt="profile"
                            class="w-48 h-48 rounded-full">
                    </div>
                    <div class="text-center mt-4">
                        <h2 class="text-xl font-bold">Disha Patel</h2>
                        <p class="text-gray-500">Frontend Developer</p>
                        <div class="text-center mt-4">
                            <a href="https://github.com/DishaPatel126" target="_blank">GitHub</a>
                        </div>
                        <div class="text-center mt-4">
                            <a href="https://twitter.com/DishaPatel261" target="_blank">Twitter</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="w-[30%]">
                <div class="bg-white py-5 rounded-lg shadow-lg">
                    <div class="flex justify-center">
                        <img src="https://dishapatel126.github.io/hosted-assets/logo.png" alt="profile"
                            class="w-48 h-48 rounded-full">
                    </div>
                    <div class="text-center mt-4">
                        <h2 class="text-xl font-bold">Vipul Mali</h2>
                        <p class="text-gray-500">Backend Developer</p>
                        <div class="text-center mt-4">
                            <a href="https://github.com/log012" target="_blank">GitHub</a>
                        </div>
                        <div class="text-center mt-4">
                            <a href="#" target="_blank">Twitter</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="text-2xl font-semibold text-[#375695] font-serif my-3">Company details (Enjay IT Solutions)</div>
        <div class="pb-4 text-[#16233C] font-semibold text-lg">Write something here </div>
        <div class="text-2xl font-semibold text-[#375695] font-serif my-3">Technologies used</div>
        <div class="pb-4 text-[#16233C] font-semibold text-lg">Write something here </div>
        <div class="text-2xl font-semibold text-[#375695] font-serif my-3">Documentation links</div>
        <div class="pb-4 text-[#16233C] font-semibold text-lg">Write something here </div>
    </div>
</body>

</html>
