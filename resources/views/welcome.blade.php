<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="author" content="Jorge E. Gutierrez">
    <meta name="email" content="jg250274@gmail.com">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'Laravel') }}</title>

    <link rel="canonical" href="https://getbootstrap.com/docs/4.3/examples/cover/">
    <link rel="stylesheet" href="{{ asset('css/tema_admin.css') }}">
    <link rel="stylesheet" href="{{ asset('css/iconos.css') }}">
    @yield('css')

    <style>
        .bd-placeholder-img {
            font-size: 1.125rem;
            text-anchor: middle;
            -webkit-user-select: none;
            -moz-user-select: none;
            -ms-user-select: none;
            user-select: none;
        }

        @media (min-width: 768px) {
            .bd-placeholder-img-lg {
                font-size: 3.5rem;
            }
        }

        /*
 * Globals
 */

        /* Links */
        a,
        a:focus,
        a:hover {
            color: #fff;
        }

        /* Custom default button */
        .btn-secondary,
        .btn-secondary:hover,
        .btn-secondary:focus {
            color: #333;
            text-shadow: none; /* Prevent inheritance from `body` */
            background-color: #fff;
            border: .05rem solid #fff;
        }

        /*
         * Base structure
         */

        html,
        body {
            height: 100%;
            background-color: #0d3832;
        }

        .nav-tabs, .tab-content {
            background-color: #ffffff0a;
        }

        body {
            display: -ms-flexbox;
            display: flex;
            color: #fff;
            text-shadow: 0 .05rem .1rem #010910f2;
            box-shadow: inset 0 0 5rem #00080aeb;
        }

        .font-wegt {
            font-weight: 500;
        }

        .cover-container {
            max-width: 42em;
        }

        /*
         * Header
         */
        .masthead {
            margin-bottom: 2rem;
        }

        .masthead-brand {
            margin-bottom: 0;
        }

        .nav-masthead .nav-link {
            padding: .25rem 0;
            font-weight: 700;
            color: rgba(255, 255, 255, .5);
            background-color: transparent;
            border-bottom: .25rem solid transparent;
        }

        .nav-masthead .nav-link:hover,
        .nav-masthead .nav-link:focus {
            border-bottom-color: rgba(255, 255, 255, .25);
        }

        .nav-masthead .nav-link + .nav-link {
            margin-left: 1rem;
        }

        .nav-masthead .active {
            color: #fff;
            border-bottom-color: #fff;
        }

        .bnt-tabs {
            color: rgba(255, 255, 255, .5);
            background-color: transparent;
            border-bottom: .25rem solid transparent;
        }

        .nav-tabs .nav-link.active {
            color: #fff;
            background: transparent;
            border-color: #fff;
            border-bottom-color: transparent;
            border-left-color: transparent;
            border-right-color: transparent;
        }

        .nav-tabs .nav-link.active:focus {
            background: transparent;
            border-color: #fff;
            border-bottom-color: transparent;
            border-left-color: transparent;
            border-right-color: transparent;
        }

        @media (min-width: 48em) {
            .masthead-brand {
                float: left;
            }

            .nav-masthead {
                float: right;
            }
        }

        /*
         * Cover
         */
        .cover {
            padding: 0 1.5rem;
        }

        .cover .btn-lg {
            padding: .75rem 1.25rem;
            font-weight: 700;
        }

        /*
         * Footer
         */
        .mastfoot {
            color: rgba(255, 255, 255, .5);
        }
    </style>
</head>
<body class="text-center">
<div class="cover-container d-flex w-100 h-100 p-3 mx-auto flex-column">
    <header class="masthead mb-auto">
        <div class="inner">
            <h3 class="masthead-brand">Admin con blog</h3>
            <nav class="nav nav-masthead justify-content-center">
                <a class="nav-link active" href="#">Inicio</a>
                <a class="nav-link" href="{{ route('blog.index') }}" target="_blank">Blog</a>
                <a class="nav-link" href="{{ route('login') }}" target="_blank">Iniciar sesion</a>
            </nav>
        </div>
    </header>

    <main role="main" class="inner cover">
        <h1 class="cover-heading">Plantilla admin con Blog simple</h1>
        <p class="lead">
            Este proyecto es una plantilla de administración desarrollada en <span class="font-wegt ">laravel con algunas integraciones de componentes vue.js</span>
            y consta de cuatro
            modulos donde todo el codigo se encuentra visible y disponible para modificarlo según lo requieran.
            <br>
            <div class="mt-2 font-wegt">Modulos</div>
        <hr style="border-color: #ffffff4a" CLASS="mt-0">
        <div class=" font-wegt">
            <nav>
                <div class="nav nav-tabs bnt-tabs" id="nav-tab" role="tablist">
                    <a class="nav-item nav-link active" id="nav-roles-tab" data-toggle="tab" href="#roles"
                       role="tab" aria-controls="roles" aria-selected="true">Roles y privilegios</a>
                    <a class="nav-item nav-link" id="nav-usuarios-tab" data-toggle="tab" href="#usuarios"
                       role="tab" aria-controls="usuarios" aria-selected="false">Usuarios</a>
                    <a class="nav-item nav-link" id="nav-blog-tab" data-toggle="tab" href="#blog"
                       role="tab" aria-controls="blog" aria-selected="false">Blog</a>
                    <a class="nav-item nav-link" id="biblioteca-tab" data-toggle="tab" href="#biblioteca"
                       role="tab" aria-controls="biblioteca" aria-selected="false">Biblioteca de archivos</a>
                </div>
            </nav>

            <div class="tab-content" id="nav-tabContent">
                <div class="tab-pane fade show active" id="roles" role="tabpanel" aria-labelledby="nav-roles-tab">
                    Permitre la creación de roles y la gestión de permisos de los usuarios con acceso al sistema.
                </div>
                <div class="tab-pane fade" id="usuarios" role="tabpanel" aria-labelledby="nav-usuarios-tab">
                    Este modulo es para la gestión de usuarios
                </div>
                <div class="tab-pane fade" id="blog" role="tabpanel" aria-labelledby="nav-blog-tab">
                    Permite la creación de categorías y contenidos los cuales se publican en el blog.
                </div>
                <div class="tab-pane fade" id="biblioteca" role="tabpanel" aria-labelledby="nav-biblioteca-tab">
                    Es un administrador de archivo y además se encuentra enlazado al editor de contenidos del blog.
                </div>
            </div>
        </div>


        </p>
        <p class="lead text-center">
            <button type="button" class="btn btn-pill btn-sm btn-brand btn-github pt-1">
                <i class="fab fa-github"></i><span>Github</span>
            </button>
        </p>
    </main>


    <footer class="mastfoot mt-auto">
        <div class="inner">
            <p>&copy;2019 Plantilla Admin, Escalable, Blog Simple, desarrollado por <strong style="color: #d6c9c9">Jorge
                    Gutierrez</strong>.
                <br><a href="mailto:jg250274@gmail.com">jg250274@gmail.com</a></p>
        </div>
    </footer>

    <script src="{{ asset('js/app.js') }}"></script>
    <script>
        $(function () {
            $('#myTab li:last-child a').tab('show')
        })
    </script>
    @yield('script-vue')
</div>
</body>
</html>
