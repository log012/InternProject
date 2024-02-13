<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <title>Document</title>
</head>
<body>
    @include('utilitis.admin_navbar')
     <main class="mt-5 pt-3">
       <div class="container-fluid">
        <div class="row">
            <div class="col-md-12 fw-bold fs-3">
                Dashboard
            </div>
        </div>
        <div class="row ">
            <div class="col-md-3 offset-md-1 mb-3">
                <div class="card text-bg-primary   h-100" >
                   
                    <div class="card-body">
                      <h3 class="card-title">Leads</h3>
                      <h3 class="card--title">Total Leads-{{count($data)}}</h3>
                      <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                    </div>
                    <div class="card-footer bg-transparent border-dark"><a href="/admin/lead_data" class="nav-link">Click here for more detail <span>></span></a></div>
                  </div>
            </div>
            <div class="col-md-3 mb-3">
                <div class="card text-bg-warning  h-100" >
                    
                    <div class="card-body">
                      <h3 class="card-title">Campaigns</h3>
                      <h3 class="card-title">Total Campaigns-</h3>
                      <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                    </div>
                    <div class="card-footer bg-transparent border-dark"><a href="" class="nav-link">Click here for more detail<span>></span></a></a></div>
                  </div>
            </div>
            <div class="col-md-3 mb-3">
                <div class="card text-bg-info  h-100" >
                    
                    <div class="card-body">
                      <h5 class="card-title">Primary card title</h5>
                      <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                    </div>
                    <div class="card-footer bg-transparent border-dark"><a href="" class="nav-link">Click here for more detail<span>></span></a></a></div>
                  </div>
            </div>
           
          
        </div>
       </div>
     </main>
</body>
</html>