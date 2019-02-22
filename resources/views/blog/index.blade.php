@extends('blog.layouts.layout_blog')

@section('content')
    <div class="row justify-content-center px-0">
        <div class="col-12 col-md-9">
            @foreach($articulos as $articulo)
                <div class="card Larger shadow border-0 p-3 mb-5 bg-white rounded">
                    <div class="p-2 d-inline">
                        @if($articulo->imagenes->count())
                        <img class="card float-left Larger shadow img-fluid mb-4 mb-md-0 rounded mr-2 d-sm-none d-lg-block" src="{{ $articulo->imagenes->get(0)->url_imagen }}" width="300">
                        @endif
                        <a href="{{ url('/blog/'.$articulo->id) }}" class="text-primary">
                            <h4 class="card-title pb-1 mt-1 ml-2 font-italic">{{$articulo->titulo}}</h4>
                        </a>
                        <p class="card-text border-top pt-3 text-justify">
                            {!! str_limit(strip_tags($articulo->contenido),500) !!}
                        </p>
                    </div>

                    <div class="card-footer row border-top-0 bg-white">
                        <div class="col-12 col-md-6 d-none d-md-block">
                            <small class="text-muted text-left">
                                Publicado el {{ date('Y m d',strtotime($articulo->created_at)) }}
                            </small>
                            <span class="badge badge-pill badge-info ml-2">Un blog de bienvenida</span>
                        </div>
                        <div class="col-12 col-md-6 d-flex justify-content-end">
                            <a href="{{ url('/blog/'.$articulo->id) }}" class="btn btn-sm " style="font-size: 16px">
                                Continuar leyendo
                            </a>
                        </div>
                    </div>
                </div>
            @endforeach
            <div class="row  d-none d-md-block">
                <div class="col-12 px-0  d-flex justify-content-center">
                    {{ $articulos->links() }}
                </div>
            </div>

            <div class="row mx-0 d-md-none">
                <div class="col-12 d-md-none d-flex justify-content-center">
                    {{ $articulos->links('vendor.pagination.simple-bootstrap-4') }}
                </div>
            </div>
        </div>

        <aside class="col-12 col-md-3 d-none d-md-block">
            @include('partials.aside_blog')
        </aside>
    </div>
    </div>

@endsection
