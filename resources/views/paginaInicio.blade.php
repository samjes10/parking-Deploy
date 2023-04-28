<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Parqueo UMSS de la FCyT</title>

        <!-- Fonts -->
        
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

        <style>
            body {
                font-family: 'Nunito', sans-serif;
            }
            body {
               height: 500px;
               background-image: url("/img/parkeo.jpg");
               background-size: cover;
               background-repeat:no-repeat;
               background-position: center center;
            }
            .inicioSesion{
               background-position: right right;
            }
            .pankarta{
                color: "#4fbec9",
                fontWeight: "bold",
                fontSize: "1.125rem",
                border: "2px solid white",
                padding: "0.4rem 1rem",
                margin: "0.3rem"
            }

        </style>
          <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
          <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
          <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    </head>
    <div>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">Software Incorporate S.R.L.</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        
        
      </ul>
      <form class="d-flex navbar-expand-bg d-flex inicioSesion" role="search">
        @if (Route::has('login'))
                <div class="">
                    @auth
                        <a href="{{ url('/home') }}" class="btn btn-outline-success text-sm text-gray-700 underline">Home</a>
                    @else
                        

                        <!-- @if (Route::has('register'))
                            <a href="{{ route('register') }}" class="ml-4 text-sm text-gray-700 underline">Register</a>
                        @endif -->
                        <a href="{{ url('/login') }}" class="btn btn-outline-success text-sm text-gray-700 underline inicioSesion">Inicio de Sesion</a>
                    @endauth
                </div>
            @endif
        
      </form>
    </div>
  </div>
</nav>
    </div>
    <body class="antialiased">
        <div class="relative flex items-top justify-center min-h-screen bg-gray-100    dark:bg-gray-900 sm:items-center py-4 sm:pt-0">
            

            <div class="pankarta max-w-8xl mx-auto sm:px-8 lg:px-10">
                <h1>Parqueo San Simon</h1>
                
            </div>
        </div>
    </body>
</html>