@extends('admin.plantilla')

@section('breadcrumb')
    <li class="breadcrumb-item active">Biblioteca</li>
@endsection

@section('contenido')

    <div id="biblioteca" style="">

        <div class="card ">
            <div class="card-body px-0 py-0">
                <iframe src="/laravel-filemanager?type=image&type=file"
                        style="width: 100%; height: 500px; overflow: hidden; border: none;">
                </iframe>
            </div>
            <div class="card-body px-0 py-0">
                    <div class="card-header pt-2 pb-0 rounded-0" style="background-color: #337ab7">
                        <div class="card-title text-white d-none d-md-block"><h5>Enlaces externos</h5></div>
                    </div>
                <principal imagenes_http="{{ $imagenes_http }}" ruta_eliminar="{{ route('biblioteca.destroy','') }}" lista_privilegios="{{ route('biblioteca.privilegios_biblioteca') }}"></principal>
            </div>
        </div>
    </div>

@section('script-vue')
    <script src="{{ asset('js/biblioteca.js') }}"></script>
@endsection
@endsection
