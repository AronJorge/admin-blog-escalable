@extends('blog.layouts.layout_blog')

@section('content')
    <div class="row justify-content-center px-0">
        <div class="col-12 col-md-9">
            <div class="card Larger shadow border-0 p-3 mb-5 bg-white rounded">
                <div class="card-body">
                    <h3 class="card-title"> Upps!</h3>
                    <p class="card-text">
                        Lo sentimos, pero el contenido de la página que estás buscando aún no esta publicado.
                    </p>
                </div>
            </div>
        </div>
        <aside class="col-12 col-md-3 d-none d-md-block">
            @include('partials.aside_blog')
        </aside>
    </div>
@endsection
