const mix = require('laravel-mix');



mix.js('resources/js/app.js', 'public/js')
    .js('resources/js/usuario/usuario.js', 'public/js')
    .js('resources/js/roles/roles.js', 'public/js')
    .js('resources/js/categorias/categorias.js', 'public/js')
    .js('resources/js/articulos/crear_articulos.js', 'public/js')
    .js('resources/js/articulos/articulos.js', 'public/js')
    .js('resources/js/biblioteca/biblioteca.js', 'public/js')
   .sass('resources/sass/app.scss', 'public/css')
   .sass('resources/sass/iconos.scss', 'public/css')
   .sass('resources/sass/tema_admin.scss', 'public/css');
