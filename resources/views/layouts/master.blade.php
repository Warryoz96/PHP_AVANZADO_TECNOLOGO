<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Detalle</title>

  <!-- Bootstrap core CSS -->
  <link href="{{ asset('bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">

  <!-- yield hoja de estilo particular -->
  @yield('estilos-particulares')  

  <!--  end yield -->
  <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
 <!-- yield librerias particulares -->
  @yield('j-deps')


  <!-- Bootstrap core JavaScript -->
  <script src="{{ asset('bootstrap/js/bootstrap.bundle.min.js')}}"></script>


</head>

<body class="bg-light">

  <!-- Navigation -->
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark static-top">
    <div class="container">
      <a class="navbar-brand" href="#"><h6>Chinook</h6></a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarResponsive">
        <ul class="navbar-nav ml-auto">
          <li class="nav-item active">
            <a class="nav-link" href="#">Incio
              <span class="sr-only">(current)</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{ url('empleados/')}}">Empleados</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{ url('artistas/')}}">Artistas</a>
          </li>

        </ul>
      </div>
    </div>
  </nav>

  <!-- Page Content -->
  <div class="container">

      @yield('nav')
    
  </div>

  


</body>

</html>
