@extends('admin.plantilla')

@section('css')
    <link rel="stylesheet" href="{{ asset('css/articulos.css') }}">
    <style>
        div.mce-fullscreen {
            z-index: 2000;
        }
    </style>
@endsection

@section('breadcrumb')
    <li class="breadcrumb-item">Articulos</li>
    <li class="breadcrumb-item active">Crear articulos</li>
@endsection

@section('contenido')
    <div id="articulos" style="">
        @if (session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session('success') }} --
                <a class="link" style="color: #28623c; font-weight: 500" href="{{ route('articulos.index') }}">
                    Ver lista Articulos
                </a>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        @endif
        <div class="card">
            <div class="card-header">
                <b>Articulos</b>
                <div class="card-header-actions pr-2">
                    <a href="{{ route('articulos.index') }}">
                        <i class="fas fa-arrow-left text-primary"></i>
                        <span class="text-primary font-weight-bold">Ver lista Articulos</span>
                    </a>
                </div>
            </div>
            <div class="card-body">
                <form class="was-validated" action="{{ route('articulos.store') }}" method="POST">
                    @csrf
                    <div class="col-12 form-group">
                        <label for="titulo">Título<span class="text-danger">*</span></label>
                        <input class="form-control{{ $errors->has('titulo') ? ' is-invalid' : '' }}" id="titulo"
                               name="titulo" type="text" placeholder="Ingresar el título" minlength="3" required
                               autofocus>

                        <div class="invalid-feedback">
                            @if ($errors->has('titulo'))
                                <div class="alert-danger" role="alert">
                                    <strong>
                                        Este campop es obligatorio, por favor agregue el título con una cantidad
                                        superior a 3 caracteres
                                    </strong>
                                </div>
                            @endif
                        </div>
                    </div>

                    <div class="col-12 mb-3">
                        <select
                            class="custom-select form-control-sm"
                            id="categoria" name="categoria" required>
                            <option value="">Seleccionar una categoría<span class="text-danger">*</span></option>
                            @foreach($categorias as $categoria)
                                <option value="{{ $categoria->id }}">{{ $categoria->nombre }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="col-12 mb-3">
                        <textarea id="articulo" name="articulo"
                                  class="form-control{{ $errors->has('articulo') ? ' is-invalid' : '' }}"
                                  placeholder="Escriba el contenido"></textarea>

                        <div class="invalid-feedback">
                            @if ($errors->has('articulo'))
                                <div class="alert-danger" role="alert">
                                    <strong>
                                        Agregar un contenido con una cantidad superior a 10 caracteres
                                    </strong>
                                </div>
                            @endif
                        </div>
                    </div>

                    <div class="col-12 mb-4">
                        <div class="input-group">
                           <span class="input-group-btn">
                             <a id="lfm" data-input="img-entrada" data-preview="holder"
                                class="btn btn-primary btn-sm rounded-0 text-white">
                               <i class="fa fa-picture-o"></i> Imagen de entrada
                             </a>
                           </span>
                            <input id="img-entrada"
                                   class="form-control form-control-sm{{ $errors->has('img-entrada') ? ' is-invalid' : '' }}"
                                   type="text" name="img-entrada">
                            <div class="invalid-feedback">
                                <div class="alert-danger" role="alert">
                                    <strong>
                                        La extensión de la imagen no es admitida
                                    </strong>
                                </div>
                            </div>
                        </div>
                        <img id="holder" style="margin-top:15px;max-height:100px;">
                    </div>

                    <div class="col-12 mb-4">
                        <div class="d-inline pr-1">Borrador</div>
                        <div class="custom-control custom-switch d-inline">
                            <input type="checkbox" class="custom-control-input" id="customSwitch1" name="customSwitch1">
                            <label class="custom-control-label text-dark" for="customSwitch1">Publicar</label>
                        </div>
                        <a href="" class="btn btn-success btn-sm float-right">Vista previa</a>
                    </div>

                    <div class="col-12 mb-4">
                        <button type="submit" class="btn btn-primary btn-sm">Guardar</button>
                        <button type="reset" id="limpiar-btn" class="btn btn-danger btn-sm">Limpiar</button>
                        <a href="{{ route('articulos.index') }}" type="button"
                           class="btn btn-light  btn-sm float-right">Cancelar</a>
                    </div>

                </form>
            </div>
        </div>
    </div>


@section('script-vue')
    <script src="{{ asset('js/tinymce/tinymce.min.js') }}"></script>
    <script>{!! \File::get(base_path('vendor/unisharp/laravel-filemanager/public/js/lfm.js')) !!}</script>
    <script src="{{ asset('js/crear_articulos.js') }}"></script>
@endsection
@endsection
