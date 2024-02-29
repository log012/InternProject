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
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous">
    </script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css"
        integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous">
    </script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link href="https://cdn.datatables.net/v/bs5/jq-3.7.0/dt-1.13.8/sc-2.3.0/datatables.min.css" rel="stylesheet">

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body>
    @include('utilitis.navbar_bootstrap')
    <main class="mt-3 pt-2">
        <div class="container px-5">

            {{-- use DataTables here --}}
            <div class="table-responsive table">
                <table class="table table-primary table-hover" id="myTable" style="box-shadow: 20px">
                    <thead class="thead-dark">
                        <tr>
                            <th>
                                Sr No
                            </th>
                            <th>
                                Leads Message
                            </th>
                            <th>
                                Facebook_Post
                            </th>

                        </tr>
                    </thead>
                    <tbody>
                        @php
                            $count = 1;
                        @endphp

                        @foreach ($data as $item)
                            {{-- {{dd($item)}} --}}
                            <tr>
                                <td>{{ $count }}</td>
                                <td><a href="https://www.facebook.com/permalink.php?story_fbid=pfbid02VWk9YSxeGYFS2G5mikzZ59xh4tb63s1B5NH3RhMK7iFqp7Tewq7HUrikpLLpNUwol&id=61556216881509

                                    "
                                        class="text-primary text-decoration-none">{{ $item['message'] }}</a></td>
                                <td><a href="https://www.facebook.com/profile.php?id=61556216881509"
                                        class="text-primary text-decoration-none">{{ $item['outerMessage'] }}</a></td>

                            </tr>
                            @php
                                $count++;
                            @endphp
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </main>
    <script src="https://cdn.datatables.net/v/bs5/jq-3.7.0/dt-1.13.8/sc-2.3.0/datatables.min.js"></script>
    <script>
        let table = new DataTable('#myTable');
    </script>
</body>

</html>
