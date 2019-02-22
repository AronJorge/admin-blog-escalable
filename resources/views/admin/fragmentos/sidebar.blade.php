<div class="sidebar">
    <nav class="sidebar-nav">

        <ul class="nav">
            <li class="nav-item">
                <a class="nav-link">
                    <i class="nav-icon icon-speedometer"></i> Dashboard
                </a>
            </li>

            @if($privilegios_list['usuarios']->is_crear  || $privilegios_list['usuarios']->is_leer  || $privilegios_list['usuarios']->is_actualizar  || $privilegios_list['usuarios']->is_eliminar)
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('usuarios.index') }}">
                        <i class="fas fa-users"></i> Usuarios</a>
                </li>
            @endif

            @if($privilegios_list['roles']->is_crear  || $privilegios_list['roles']->is_leer  || $privilegios_list['roles']->is_actualizar  || $privilegios_list['roles']->is_eliminar)
                {{--Roles--}}
                <li class="nav-item nav-dropdown">
                    <a class="nav-link nav-dropdown-toggle" href="#">
                        <i class="fas fa-key"></i>
                        Roles & Privilegios
                    </a>
                    <ul class="nav-dropdown-items">
                        @if($privilegios_list['roles']->is_crear)
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('roles.create') }}">
                                    <i class="nav-icon icon-puzzle"></i> Añadir Nuevo Rol</a>
                            </li>
                        @endif

                        @if($privilegios_list['roles']->is_leer  || $privilegios_list['roles']->is_actualizar  || $privilegios_list['roles']->is_eliminar)
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('roles.index') }}">
                                    <i class="nav-icon icon-puzzle"></i> Ver Roles</a>
                            </li>
                        @endif
                    </ul>
                </li>
            @endif


            @if($privilegios_list['sliders']->is_crear  || $privilegios_list['sliders']->is_leer  || $privilegios_list['sliders']->is_actualizar  || $privilegios_list['sliders']->is_eliminar)
                <li class="nav-item">
                    <a class="nav-link">
                        <i class="fas fa-sliders-h"></i> Slider<span class="text-muted"> Por desarrollar</span></a>
                </li>
            @endif

            @if($privilegios_list['menus']->is_crear  || $privilegios_list['menus']->is_leer  || $privilegios_list['menus']->is_actualizar  || $privilegios_list['menus']->is_eliminar)
                <li class="nav-item">
                    <a class="nav-link">
                        <i class="fas fa-bars"></i> Menú<span class="text-muted"> Por desarrollar</span>
                    </a>
                </li>
            @endif

            @if(($privilegios_list['articulos']->is_leer  || $privilegios_list['articulos']->is_actualizar  || $privilegios_list['articulos']->is_eliminar  || $privilegios_list['articulos']->is_crear) ||
            ($privilegios_list['categorias']->is_crear  || $privilegios_list['categorias']->is_leer  || $privilegios_list['categorias']->is_actualizar  || $privilegios_list['categorias']->is_eliminar))
                <li class="nav-item nav-dropdown">
                    <a class="nav-link nav-dropdown-toggle" href="#">
                        <i class="fas fa-blog"></i>
                        Blog
                    </a>
                    <ul class="nav-dropdown-items">
                        @if($privilegios_list['articulos']->is_leer  || $privilegios_list['articulos']->is_actualizar  || $privilegios_list['articulos']->is_eliminar)
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('articulos.index') }}">
                                    <i class="nav-icon icon-puzzle"></i> Ver Articulos</a>
                            </li>
                        @endif
                        @if($privilegios_list['articulos']->is_crear)
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('articulos.create') }}">
                                    <i class="nav-icon icon-puzzle"></i> Crear Articulos</a>
                            </li>
                        @endif
                        @if($privilegios_list['categorias']->is_crear  || $privilegios_list['categorias']->is_leer  || $privilegios_list['categorias']->is_actualizar  || $privilegios_list['categorias']->is_eliminar)
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('categorias.index') }}">
                                    <i class="nav-icon icon-puzzle"></i> Categorías</a>
                            </li>
                        @endif
                    </ul>
                </li>
            @endif


            @if($privilegios_list['biblioteca']->is_crear  || $privilegios_list['biblioteca']->is_leer  || $privilegios_list['biblioteca']->is_actualizar  || $privilegios_list['biblioteca']->is_eliminar)
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('biblioteca.index') }}">
                        <i class="far fa-file-archive"></i> Biblioteca</a>
                </li>
            @endif

        </ul>
    </nav>
    <button class="sidebar-minimizer brand-minimizer" type="button"></button>
</div>
