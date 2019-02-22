@extends('admin.plantilla')

@section('breadcrumb')
    <li class="breadcrumb-item active">Articulos</li>
@endsection

@section('contenido')
    <div id="articulo" style="">
        @if (session('info'))
            <div class="alert alert-info alert-dismissible fade show" role="alert">
                <a class="link" style="color: #28623c; font-weight: 500" href="{{ route('categorias.index') }}">
                    Ver lista de categorías
                </a>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        @endif

        <principal privilegios_modulo="{{ $privilegios_modulo }}"></principal>
    </div>


@section('script-vue')
    <script src="{{ asset('js/articulos.js') }}"></script>
@endsection
@endsection
