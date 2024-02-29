{{-- navbar --}}

<nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
  <div class="container-fluid">
    {{-- offcanvas trigger --}}
    <button class="navbar-toggler me-2" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasExample" aria-controls="offcanvasExample">
      <span class="navbar-toggler-icon" data-bs-target="#offcanvasExample"></span>
    </button>
    <a class="navbar-brand fw-bold text-uppercase me-auto" href="#">Web App</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      
      <form class="d-flex ms-auto my-3 my-lg-0" role="search">
        <div class="input-group">

          <input type="text" class="form-control" placeholder="Recipient's username" aria-label="Recipient's username" aria-describedby="button-addon2">
          <button class="btn btn-primary" type="button" id="button-addon2"><i class="bi bi-search"></i></button>
        </div>
        </form>
     
        <ul class="navbar-nav mb-2 mb-lg-0">

        
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            <i class="bi bi-person-fill"></i>
          </a>
          <ul class="dropdown-menu dropdown-menu-end">
            <li><a class="dropdown-item" href="#">@if (Session::has('userName'))
              <h5>{{Session::get('userName')}}</h5>
            @endif</a></li>
           
          </ul>
        </li>
      </ul>
    </div>
  </div>
</nav>

{{-- offcanvas --}}



<div class="offcanvas offcanvas-start bg-dark text-white sidebar" tabindex="-1" id="offcanvasExample" aria-labelledby="offcanvasExampleLabel" >
  
  <div class="offcanvas-body p-0">
     <nav class="navbar-dark">
         <ul class="navbar-nav">
          <li>
            <div class="  fw-bold text-uppercase px-3">
              CORE
            </div>
          </li>
          <li class="">
            <a href="/admin/dashboard" class="nav-link px-3 navbar-button">
              <span class="me-2">
                <i class="bi bi-speedometer2"></i>
              </span>
              <span>Dashboard</span>
            </a>
          </li>
          <li class="">
            <a href="/home" class="nav-link px-3 navbar-button" id="index">
              <span class="me-2">
                <i class="bi bi-speedometer2"></i>
              </span>
              <span>Home</span>
            </a>
          </li>
          <li class="my-4">
              <hr class=""/>
          </li>
          <li>
            <div class="fw-bold text-uppercase px-3">
              Main Menu
            </div>
          </li>
          <li class="Active">
            <a href="/admin/campaignes" class="nav-link px-3  navbar-button">
              <span class="me-2">
                <i class="bi bi-bounding-box-circles"></i>
              </span>
              <span>Campaignes</span>
            </a>
          </li>
          <li>
            <a href="/admin/lead_data" class="nav-link px-3  navbar-button">
              <span class="me-2">
                <i class="bi bi-currency-dollar"></i>
              </span>
              <span>Leads</span>
            </a>
          </li>
          <li class="Active">
            <a href="/admin/chat" class="nav-link px-3  navbar-button">
              <span class="me-2">
                <i class="bi bi-chat-fill"></i>
              </span>
              <span>Chat</span>
            </a>
          </li>
          <li class="Active">
            <form method="POST" class="ms-auto my-3 my-lg-0" action="{{ route('logout') }}">
              @csrf
              <button type="submit" class="btn btn-danger">Logout</button>
          </form>
          </li>
         
         </ul>
     </nav>
  </div>
</div>