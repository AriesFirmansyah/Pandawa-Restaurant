<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
    
    <!-- Jquery -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <!--AOS-->
    <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />
    
    
    <title>@yield('title')</title>
    @yield('styles')
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Comfortaa:wght@700&display=swap');
        .logo {
            width: 80px;
            border-radius: 50%
        }
        body {
            font-family: 'Comfortaa', cursive;
        }
        a {
            color: aliceblue;
            font-weight: bold
        }
        .note {
            style="background: rgba(36, 34, 34, 0.5);"
        }
    </style>
  </head>
  <body>
      <header>
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark" style="background-color: transparent;">
            <div class="container">
                <img class="logo"  src="{{asset("storage/assets/logo1.png")}}" alt="Pandawa">
                <a class="navbar-brand" href="/">Pandawa Restaurant</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent" style="margin-left: 30px">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <li class="nav-item">
                            <a class="nav-link {{request()->is('/') ? 'active' : '' }}" aria-current="page" href="/">HOME</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link {{request()->is('menu') ? 'active' : '' }}" href="/menu">MENU</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link {{request()->is('contact') ? 'active' : '' }}" href="/contact">CONTACT</a>
                        </li>
                        <li class="nav-item {{request()->is('about') ? 'active' : '' }}">
                            <a class="nav-link" href="/about">ABOUT</a>
                        </li>
                        
                        @guest
                        
                        @else
                            @if (auth()->user()->level == "admin")
                                <li class="nav-item">
                                    <a class="nav-link" href="/admin">MENU ADMIN</a>
                                </li>
                            @elseif (auth()->user()->level == "user")
                                <li class="nav-item">
                                    <a class="nav-link {{request()->is('keranjang') ? 'active' : '' }}" href="/keranjang">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-cart-fill" viewBox="0 0 16 16" style="color: #524d4d;">
                                            <path d="M0 1.5A.5.5 0 0 1 .5 1H2a.5.5 0 0 1 .485.379L2.89 3H14.5a.5.5 0 0 1 .491.592l-1.5 8A.5.5 0 0 1 13 12H4a.5.5 0 0 1-.491-.408L2.01 3.607 1.61 2H.5a.5.5 0 0 1-.5-.5zM5 12a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm7 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm-7 1a1 1 0 1 1 0 2 1 1 0 0 1 0-2zm7 0a1 1 0 1 1 0 2 1 1 0 0 1 0-2z"/>
                                        </svg>
                                        CART
                                    </a>
                                </li>
                            @endif
                        @endguest
                       
                        
                        
                    </ul>
                    <div class="d-flex">
                        @guest
                            @if (Route::has('login'))
                                <a class="btn btn-warning" href="/Login" style="margin-right: 10px;">
                                    Log in
                                </a>
                            @endif
                            
                            @if (Route::has('register'))
                                <a href="/SignUp"><button class="btn btn-warning" type="submit">Register</button></a>
                            @endif
                        @else
                            <h5 style="color: aliceblue;text-transform:capitalize;margin-right:20px;margin-top:5px">
                                Hallo, {{ Auth::user()->firstname }}
                            </h5>
                           
                            <a  class="btn btn-warning" href="{{ route('logout') }}"
                            onclick="event.preventDefault();
                                            document.getElementById('logout-form').submit();">
                                Log out
                            </a>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none" style="width: 10px">
                                    @csrf
                                </form>
                        @endguest
                    </div>
                </div>
            </div>
          </nav>
      </header>
    @if (session('status'))
        <div id="status" class="alert alert-success" style="position:static">
            {{ session('status') }}
        </div>
    @endif
    @yield('body')
    <footer class="bg-dark" style="padding-left:20px;padding-right:20px;padding-bottom: 80px;">
        <div class="container-fluid" style="color: aliceblue">
          <div class="row">
            <div class="col-lg-3 col-md-6 footer" style="margin-top: 40px">
              <h2>Pandawa Info</h2>
              <p><a href="/about">About Pandawa</a></p>
              <p><a href="/contact">Contact</a></p>
            </div>
            <div class="col-lg-3 col-md-6 footer" style="margin-top: 40px">
              <h2>Location</h2>
              <p>Jl. Pandawa No.23, East Jurang Manggu, South Tangerang City, Banten</p>
            </div>
            <div class="col-lg-3 col-md-6 footer" style="margin-top: 40px">
              <h2>Contact</h2>
              <p>089656195418 (Phone)</p>
              <p>aries.firmansyah@student.umn.ac.id (Email)</p>
              <p>089656195418 (Whatsapp)</p>
            </div>
          </div>
        </div>
      </footer>
    <script>
        setTimeout(function(){ 
            $("#status").fadeOut(3000); 
        }, 3000);
    </script>
    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js" integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.6.0/dist/umd/popper.min.js" integrity="sha384-KsvD1yqQ1/1+IA7gi3P0tyJcT3vR+NdBTt13hSJ2lnve8agRGXTTyNaBYmCR/Nwi" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.min.js" integrity="sha384-nsg8ua9HAw1y0W1btsyWgBklPnCUAFLuTMS2G72MMONqmOymq585AcH49TLBQObG" crossorigin="anonymous"></script>
    -->
    
    <script src="https://unpkg.com/aos@next/dist/aos.js"></script>
    <script>
        AOS.init();
  </script>
  </body>
</html>