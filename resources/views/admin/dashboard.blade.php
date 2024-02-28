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
    <div class="min-h-screen bg-gray-100 py-6 px-10">
        <h1 class="font-bold text-2xl text-[#16233C]">Dashboard
        </h1>
        <br>
        <div class="flex flex-wrap gap-4 pb-4">
            <div class="w-[30%] flex">
                <div class="bg-[#0062A3] py-5 rounded-lg shadow-lg flex-grow">
                    <div class="mt-4 px-5">
                        <h2 class="text-2xl font-bold text-white">Leads</h2>
                        <h2 class="text-xl font-bold text-white">Total Leads-1</h2> {{-- add {{count($data)}} --}}

                        <p class="text-[#ddd] pb-6">Some quick example text to build on the card title and make up the
                            bulk of the card's content.</p>

                        <hr class="pt-1">
                        <div class="text-white"><a href="/admin/lead_data">Click here for more detail <span>></span></a>
                        </div>
                    </div>
                </div>
            </div>

            <div class="w-[30%] flex">
                <div class="bg-[#E0A929] py-5 rounded-lg shadow-lg flex-grow">
                    <div class="mt-4 px-5">
                        <h2 class="text-2xl font-bold text-black">Campaigns</h2>
                        <h2 class="text-xl font-bold text-balck">Total Campaigns-1</h2> {{-- add {{count($data)}} --}}

                        <p class="text-[#2F2F2F] pb-6">Some quick example text to build on the card title and make up the bulk of the card's content.</p>

                        <hr class="pt-1">
                        <div class="text-black"><a href="/admin/lead_data">Click here for more detail <span>></span></a>
                        </div>
                    </div>
                </div>
            </div>

            <div class="w-[30%] flex">
                <div class="bg-[#008A8F] py-5 rounded-lg shadow-lg flex-grow">
                    <div class="mt-4 px-5">
                        <h2 class="text-2xl font-bold text-white">Primary card title</h2>
                        
                        {{--<h2 class="text-xl font-bold text-white">Total Leads-1</h2> {{-- add {{count($data)}} --}}

                        <p class="text-[#ddd] pb-[3.25rem]">Some quick example text to build on the card title and make up the
                            bulk of the card's content.</p>

                        <hr class="pt-1">
                        <div class="text-white"><a href="/admin/lead_data">Click here for more detail <span>></span></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>