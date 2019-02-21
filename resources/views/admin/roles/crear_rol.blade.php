@extends('admin.plantilla')

@section('breadcrumb')
    <li class="breadcrumb-item">
    <a href="{{ route('roles.index') }}">Roles</a>
    </li>
    <li class="breadcrumb-item active">Crear rol</li>
@endsection

@section('contenido')

    <div class="card">
        <div class="card-header">
            <b>Roles</b>
            <div class="card-header-actions pr-2">
                <a href="{{ route('roles.index') }}">
                    <i class="fas fa-arrow-left text-primary"></i>
                    <span class="text-primary font-weight-bold">Volver</span>
                </a>
            </div>
        </div>
        <div class="card-body">
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            @if (session('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    {{ session('success') }} --
                    <a class="link" style="color: #28623c; font-weight: 500" href="{{ route('roles.index') }}">
                        Ver lista roles
                    </a>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            @endif

            <form action="{{ route('roles.store') }}" method="POST">
                {{ csrf_field() }}
                <div class="row">
                    <div class="col-sm-12 col-md-6">
                        <div class="form-group">
                            <label for="name">Nombre del rol<span class='text-danger'>*</span></label>
                            <input class="form-control" id="nombre" name="nombre" type="text"
                                   placeholder="Ingrese un nombre">
                        </div>
                    </div>

                    <div class="col-sm-12 col-md-6">
                        <div class="form-group">
                            <label for="ccnumber">Establecer como Superadmin<span class='text-danger'>*</span></label>
                            <div class="col-md-9 col-form-label">
                                <div class="custom-control custom-radio custom-control-inline">
                                    <input type="radio" id="radio_no" name="is_superadmin"
                                           class="custom-control-input" onclick="ocultarFom(this)" value="0" checked>
                                    <label class="custom-control-label" for="radio_no">No</label>
                                </div>
                                <div class="custom-control custom-radio custom-control-inline">
                                    <input type="radio" id="radio_si" name="is_superadmin"
                                           class="custom-control-input" onclick="ocultarFom(this)" value="1">
                                    <label class="custom-control-label" for="radio_si">Si</label>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>

                <div class="row">
                    <div class="col-12 font-sm font-weight-bolder text-primary">
                       <label>Permisos</label>
                    </div>
                    <div class="col-12">
                        <div class="collapse show ocultar" id="collapseExample">
                            <div class="form-group table-responsive">
                                <table class="table table-striped table-bordered table-sm">
                                    <thead>
                                    <tr class="active" style="background-color: #f5f5f5">
                                        <th>No.</th>
                                        <th width="60%">Módulos</th>
                                        <th>&nbsp;</th>
                                        <th>Leer</th>
                                        <th>Crear</th>
                                        <th>Actualizar</th>
                                        <th>Eliminar</th>
                                    </tr>
                                    <tr style="background-color: #d9edf7">
                                        <th>&nbsp;</th>
                                        <th>&nbsp;</th>
                                        <th>&nbsp;</th>
                                        <td align="center">
                                            <input title="Check all vertical" type="checkbox" value="1"
                                                   onClick="toggleVertical(this)"
                                                   id="is_leer" name="is_leer">
                                        </td>
                                        <td align="center">
                                            <input title="Check all vertical" type="checkbox" value="1"
                                                   onClick="toggleVertical(this)"
                                                   id="is_create" name="is_create">
                                        </td>
                                        <td align="center">
                                            <input title="Check all vertical" type="checkbox" value="1"
                                                   onClick="toggleVertical(this)"
                                                   id="is_actualizar" name="is_actualizar">
                                        </td>
                                        <td align="center">
                                            <input title="Check all vertical" type="checkbox" value="1"
                                                   onClick="toggleVertical(this)"
                                                   id="is_eliminar" name="is_eliminar">
                                        </td>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @forelse($modulos as $modulo)
                                        <tr>
                                            <td>{{ $modulo->id  }}</td>
                                            <td>{{ $modulo->modulo }}</td>
                                            <td style="background-color: #f5f5f5" align="center">
                                                <input type="checkbox" value="1"
                                                       class="select_horizontal_{{ $modulo->id }}"
                                                       onClick="toggleHorisontal(this,{{$modulo->id}})">
                                            </td>
                                            <td style="background-color: #fcf8e3" align="center">
                                                <input type="checkbox" value="1" class="is_leer_{{$modulo->id}}"
                                                       name="is_leer_{{$modulo->id}}" id="is_leer_{{$modulo->id}}"
                                                       onClick="validacionChecked(this,'is_leer',{{$modulo->id}})">
                                            </td>
                                            <td style="background-color: #d9edf7" align="center">
                                                <input type="checkbox" value="1" class="is_create_{{$modulo->id}}"
                                                       name="is_create_{{$modulo->id}}" id="is_create_{{$modulo->id}}"
                                                       onClick="validacionChecked(this,'is_create',{{$modulo->id}})">
                                            </td>
                                            <td style="background-color: #dff0d8" align="center">
                                                <input type="checkbox" value="1" class="is_actualizar_{{$modulo->id}}"
                                                       name="is_actualizar_{{$modulo->id}}"
                                                       id="is_actualizar_{{$modulo->id}}"
                                                       onClick="validacionChecked(this,'is_actualizar',{{$modulo->id}})">
                                            </td>
                                            <td style="background-color: #f2dede" align="center">
                                                <input type="checkbox" value="1" class="is_eliminar_{{$modulo->id}}"
                                                       name="is_eliminar_{{$modulo->id}}"
                                                       id="is_eliminar_{{$modulo->id}}"
                                                       onClick="validacionChecked(this,'is_eliminar',{{$modulo->id}})">
                                            </td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td class="text-center font-weight-bold" colspan="7">No hay modulos</td>
                                        </tr>
                                    @endforelse
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="form-actions">
                            <button class="btn btn-primary btn-sm" type="submit">Guardar</button>
                            <a class="btn btn-secondary btn-sm" href="{{ route('roles.index') }}">Cancelar</a>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>

@section('script-vue')
    <script>
        const modulos = @json($modulos);

        function ocultarFom(source) {
            if (source.id == 'radio_no')
                $('.ocultar').collapse('show')
            else if (source.id == 'radio_si')
                $('.ocultar').collapse('hide')
        }

        function toggleVertical(source) {
            for (var i = 0, n = modulos.length; i < n; i++)
                document.getElementsByClassName(source.id + '_' + modulos[i].id)[0].checked = source.checked;
        }

        function toggleHorisontal(source, id) {
            let prefijoClassArray = ['is_leer_', 'is_create_', 'is_actualizar_', 'is_eliminar_'];
            for (let i = 0; i < prefijoClassArray.length; i++)
                document.getElementsByClassName(prefijoClassArray[i] + id)[0].checked = source.checked
        }

        function validacionChecked(source, prefijoParam, id) {
            let prefijoClassArray = ['is_leer_', 'is_create_', 'is_actualizar_', 'is_eliminar_'];
            let validacion = [];

            for (let i = 0; i < prefijoClassArray.length; i++)
                validacion.push(document.getElementsByClassName(prefijoClassArray[i] + id)[0].checked)

            if (validacion.indexOf(false) >= 0)
                document.getElementsByClassName('select_horizontal_' + id)[0].checked = false;
            else
                document.getElementsByClassName('select_horizontal_' + id)[0].click();

            validacion = [];
            for (var i = 0, n = modulos.length; i < n; i++) {
                validacion.push(document.getElementsByClassName(prefijoParam + '_' + modulos[i].id)[0].checked);
            }

            if (validacion.indexOf(false) >= 0)
                document.getElementById(prefijoParam).checked = false;
            else
                document.getElementById(prefijoParam).click();
        }
    </script>
@endsection
@endsection
