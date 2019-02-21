@extends('admin.plantilla')

@section('breadcrumb')
    <li class="breadcrumb-item active">Roles</li>
@endsection

@section('contenido')

    <div id="roles" style="">

        <div class="card">
            <div class="card-header">
                <b>Roles</b>
                @if($privilegios_modulo->is_crear)
                    <div class="card-header-actions pr-2">
                        <a href="{{ route('roles.create') }}">
                            <span class="text-primary font-weight-bold">Crear</span>
                            <i class="fas fa-key text-primary"></i>
                        </a>
                    </div>
                @endif
            </div>
            <div class="card-body">
                @if (session('success'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        {{ session('success') }}
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                @endif
                @if (session('info'))
                    <div class="alert alert-warning alert-dismissible fade show" role="alert">
                        {{ session('info') }}
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                @endif

                <principal roles="{{ $roles }}" privilegios_modulo="{{ $privilegios_modulo }}"></principal>
            </div>
        </div>
    </div>


@section('script-vue')
    <script src="{{ asset('js/roles.js') }}"></script>
@endsection
@endsection
