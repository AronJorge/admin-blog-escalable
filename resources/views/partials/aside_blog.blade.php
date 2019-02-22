<div class="p-3 mb-3 bg-light rounded Larger shadow">
    <h4 class="font-italic">Nosotros</h4>
    <p class="mb-0">
        Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ab animi aperiam assumenda aut dignissimos, dolore
        dolores doloribus, eaque et eum expedita facilis iusto nobis provident, quia recusandae repellat veniam
        voluptas!
    </p>
</div>

<div class="p-3 Larger">
    <h4 class="font-italic">Categorias</h4>
    <ol class="list-unstyled mb-0 row">
        @foreach($categorias as $categoria)
            <li class="col-12 col-md-6">
                <a class=""
                   href="{{ route('categorias.filtrarPorCategoria',$categoria->id) }}">{{ $categoria->nombre }}</a>
            </li>
        @endforeach
    </ol>
</div>

<div class="p-3">
    <h4 class="font-italic">Acceso</h4>
    <ol class="list-unstyled">
        <li><a href="{{ route('login') }}">Iniciar sesion</a></li>
        <li><a href="{{ route('password.request') }}">Reestablecer contraseña</a></li>
    </ol>
</div>

