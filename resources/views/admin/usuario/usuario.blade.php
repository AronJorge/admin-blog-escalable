@extends('admin.plantilla')

@section('breadcrumb')
    <li class="breadcrumb-item active">Usuarios</li>
@endsection

@section('contenido')

    <div id="usuario" style="">
        @if (session('info'))
            <div class="alert alert-info alert-dismissible fade show" role="alert">
                {{ session('info') }} --
                <a class="link" style="color: #28623c; font-weight: 500" href="{{ route('roles.index') }}">
                    Ver lista roles
                </a>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        @endif
        <principal usuario="{{ $users }}" roles="{{ $roles }}" privilegios_modulo="{{ $privilegios_modulo }}"></principal>
    </div>


@section('script-vue')
    <script src="{{ asset('js/usuario.js') }}"></script>
@endsection
@endsection
