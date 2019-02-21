@extends('admin.plantilla')

@section('breadcrumb')
    <li class="breadcrumb-item active">Categorías</li>
@endsection

@section('contenido')

    <div id="categorias" style="">
        @if (session('info'))
            <div class="alert alert-info alert-dismissible fade show" role="alert">
                {{ session('info') }} --
                <a class="link" style="color: #28623c; font-weight: 500" href="{{ route('categorias.index') }}">
                    Ver lista de categorías
                </a>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        @endif
        <principal categorias="{{ $categorias }}"  privilegios_modulo="{{ $privilegios_modulo }}"></principal>
    </div>


@section('script-vue')
    <script src="{{ asset('js/categorias.js') }}"></script>
@endsection
@endsection
