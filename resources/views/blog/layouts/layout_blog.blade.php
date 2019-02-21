<!doctype html>
<html lang="es">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->

    <link rel="stylesheet" href="{{ asset('css/tema_admin.css') }}">
    <link rel="stylesheet" href="{{ asset('css/iconos.css') }}">
    <title>{{ config('app.name', 'Laravel') }}</title>
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-light bg-vk">
    <a class="navbar-brand font-weight-bolder text-white" href="#"> MI PLATAFORMA</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <div class="mr-auto"></div>
        <ul class="navbar-nav px-lg-4 font-weight-bolder">
            <li class="nav-item active ">
                <a class="nav-link text-white" href="#">Inicio <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link text-white" href="#">Blog</a>
            </li>
        </ul>
    </div>
</nav>

<div class="jumbotron p-3 p-md-3 pt-md-4  text-white rounded bg-dark"
     style="background-image: url('/img/2_1.png');background-position: bottom; background-size: cover; background-repeat: no-repeat">
    <div class="col-md-8 offset-md-2 text-center" style="">
        <h1 class="display-6 font-italic">Pensamos en la historia del Lorem Ipsum</h1>
        <p class="lead my-3 py-3">
            El Lorem Ipsum fue concebido como un texto de relleno, formateado de una cierta manera para permitir la
            presentación de elementos gráficos en documentos, sin necesidad de una copia formal.
        </p>
        <p class="lead mb-0"><span class="text-white font-weight-bold">....</span></p>
        <br>
    </div>
</div>

<div class="container my-4">

    @yield('content')
</div>


<script src="{{ asset('js/app.js') }}"></script>

@yield('script')
</body>
</html>
