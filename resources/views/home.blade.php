@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Dashboard</div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif

                        <div class="row">
                            <div class="col-12">
                                Ya inicio sesion -- esto es una demo del funcionamiento
                            </div>
                        </div>
                        <h4>-- Enlaces de muestra -- </h4>
                        <ul>
                            <li><a target="_blank" href="/blog">Blog</a></li>
                            <li><a target="_blank" href="/blog/12">Un articulo del blog</a></li>
                            <li><a target="_blank" href="/admin/usuarios">Usuarios</a></li>
                            <li><a target="_blank" href="/admin/roles">Ver Roles (Contiene enlaces crear, editar y eliminar)</a></li>
                            <li><a target="_blank" href="/admin/roles/create">Crear Roles</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
