@extends('blog.layouts.layout_blog')

@section('content')
    <div class="row justify-content-center px-0">
        <div class="col-12 col-md-9">
            <div class="card Larger shadow border-0 p-3 mb-5 bg-white rounded">
                @if($blog->imagenes->count())
                    <img class="card-img-top" src="{{ $blog->imagenes->get(0)->url_imagen }}">
                @endif

                <div class="card-footer bg-white">
                    <small class="text-muted text-left">
                        Publicado el {{ date('d-m-Y',strtotime($blog->created_at)) }}
                    </small>
                    <span class="badge badge-pill badge-info ml-2">{{ $blog->categoria->nombre }}</span>
                </div>

                <div class="card-body">
                    <h5 class="card-title">{{ $blog->titulo }}</h5>
                    <p class="card-text">
                        {!! $blog->contenido !!}
                    </p>
                </div>
            </div>
            <div class="d-md-none">
                @include('partials.comentario_facebook')
            </div>
        </div>
        <aside class="col-12 col-md-3 d-none d-md-block">
            @include('partials.aside_blog')
        </aside>
    </div>
    <div class="d-md-block d-none card col-12 col-md-9">
        @include('partials.comentario_facebook')
    </div>
@endsection
