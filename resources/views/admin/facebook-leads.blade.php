<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="https://cdn.datatables.net/v/bs5/jq-3.7.0/dt-1.13.8/sc-2.3.0/datatables.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <title>Document</title>
</head>
<body>
    @include('utilitis.admin_navbar')
    <main class="mt-5 pt-3">
        <div class="container mt-3">
            <div class="heading d-flex justify-content-center">
                   <h1>Total leads Details</h1>
            </div>
            {{-- use DataTables here --}}
            <div class="table mt-5" >
                <table class="table table-primary table-hover" id="myTable">
                     <thead>
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
                            <th>
                                Actions
                            </th>
                          </tr>
                     </thead>
                     <tbody>
                        @php
                            $count=1;
                        @endphp
                        
                          @foreach ($data as $item)
                             {{-- {{dd($item)}} --}}
                              <tr>
                                 <td>{{$count}}</td>
                                 <td><a href="https://www.facebook.com/permalink.php?story_fbid=pfbid02VWk9YSxeGYFS2G5mikzZ59xh4tb63s1B5NH3RhMK7iFqp7Tewq7HUrikpLLpNUwol&id=61556216881509

                                    " class="text-primary text-decoration-none">{{$item['message']}}</a></td>
                                 <td><a href="https://www.facebook.com/profile.php?id=61556216881509" class="text-primary text-decoration-none">{{($item['outerMessage'])}}</a></td>
                                 <td>
                                    {{-- @dd($item['from']) --}}
                                    @if (isset($item['from']))
                                    <a href="/admin/user_detail/{{$item['from']}}" class="btn btn-success">User</a>

                                    @else
                                        <span>The user information not found</span>
                                    @endif
                                 </td>
                              </tr>
                             @php
                                 $count++
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