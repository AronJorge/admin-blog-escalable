<!DOCTYPE html>
<html lang="es">
<head>
    <base href="./">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <meta name="author" content="Jorge E. Gutierrez">
    <meta name="email" content="jg250274@gmail.com">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Admin Escalable</title>
    <link rel="stylesheet" href="{{ asset('css/tema_admin.css') }}">
    <link rel="stylesheet" href="{{ asset('css/iconos.css') }}">
    @yield('css')
</head>
<body class="app header-fixed sidebar-fixed aside-menu-fixed sidebar-lg-show">
<header class="app-header navbar">
    <button class="navbar-toggler sidebar-toggler d-lg-none mr-auto" type="button" data-toggle="sidebar-show">
        <span class="navbar-toggler-icon"></span>
    </button>
    <a class="navbar-brand" href="#">
        MI PLATAFORMA
    </a>
    <button class="navbar-toggler sidebar-toggler d-md-down-none" type="button" data-toggle="sidebar-lg-show">
        <span class="navbar-toggler-icon"></span>
    </button>

    <ul class="navbar-nav ml-auto">
        <li class="nav-item dropdown pr-3">
            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown"
               aria-haspopup="true" aria-expanded="false" v-pre>
                {{ Auth::user()->name }} <span class="caret"></span>
            </a>

            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                <a class="dropdown-item" href="{{ route('logout') }}"
                   onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                    {{ __('Logout') }}
                </a>

                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    @csrf
                </form>
            </div>
        </li>
    </ul>
</header>
<div class="app-body">
    @include('admin.fragmentos.sidebar')
    <main class="main">
        @include('admin.fragmentos.breadcrumb')
        <div class="container-fluid">
            <div class="animated fadeIn">
                @yield('contenido')
            </div>
        </div>
    </main>
</div>

@include('admin.fragmentos.footer')
<script src="{{ asset('js/app.js') }}"></script>
@yield('script-vue')
</body>
</html>

