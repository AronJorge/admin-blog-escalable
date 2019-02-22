# Plantilla admin con blog simple y sistema de roles y permisos

Esta es una aplicación modular desarrollada con framework laravel que contiene algunos componentes vue.

Modulos:
  - Role y privilegios
  - Usuarios
  - Blog
  - Biblioteca

## Imagenes
| [![](https://raw.githubusercontent.com/AronJorge/admin-blog-escalable/develop/public/images/img_demo/crear_rol.png)](https://raw.githubusercontent.com/AronJorge/admin-blog-escalable/develop/public/images/img_demo/crear_rol.png "Crear roles - Módulo de Roles y privilegios")  |  [![](https://raw.githubusercontent.com/AronJorge/admin-blog-escalable/develop/public/images/img_demo/lista_roles.png)](https://raw.githubusercontent.com/AronJorge/admin-blog-escalable/develop/public/images/img_demo/lista_roles.png "Listar roles - Módulo de Roles y privilegios")  |
| ------------ | ------------ |
| [![](https://raw.githubusercontent.com/AronJorge/admin-blog-escalable/develop/public/images/img_demo/usuario.png)](https://raw.githubusercontent.com/AronJorge/admin-blog-escalable/develop/public/images/img_demo/usuario.png "Usuarios - Módulo de Usuarios")  |  [![](https://raw.githubusercontent.com/AronJorge/admin-blog-escalable/develop/public/images/img_demo/categorias.png)](https://raw.githubusercontent.com/AronJorge/admin-blog-escalable/develop/public/images/img_demo/categorias.png "Categorías - Módulo del Blog")  |
| [![](https://raw.githubusercontent.com/AronJorge/admin-blog-escalable/develop/public/images/img_demo/crear_articulos.png)](https://raw.githubusercontent.com/AronJorge/admin-blog-escalable/develop/public/images/img_demo/crear_articulos.png "Crear artículos - Módulo del Blog")  | [![](https://raw.githubusercontent.com/AronJorge/admin-blog-escalable/develop/public/images/img_demo/lista_articulos.png)](https://raw.githubusercontent.com/AronJorge/admin-blog-escalable/develop/public/images/img_demo/lista_articulos.png "Listar Artículos - Módulo de Roles y privilegios")  |
|[![]()]( "Crear roles - Módulo de Roles y privilegios")  |
| [![](https://raw.githubusercontent.com/AronJorge/admin-blog-escalable/develop/public/images/img_demo/biblioteca.png)](https://raw.githubusercontent.com/AronJorge/admin-blog-escalable/develop/public/images/img_demo/biblioteca.png "Biblioteca - Módulo de Biblioteca")  ||
|[![](https://raw.githubusercontent.com/AronJorge/admin-blog-escalable/develop/public/images/img_demo/listar_blog.png)](https://raw.githubusercontent.com/AronJorge/admin-blog-escalable/develop/public/images/img_demo/listar_blog.png "Listar artículos - Vista publica")  | [![](https://raw.githubusercontent.com/AronJorge/admin-blog-escalable/develop/public/images/img_demo/un_blog_articulo.png)](https://raw.githubusercontent.com/AronJorge/admin-blog-escalable/develop/public/images/img_demo/un_blog_articulo.png "Un artículo - Vista publica") |


## Iniciar
```sh
$ git clone https://github.com/AronJorge/admin-blog-escalable.git
$ cd admin-blog-escalable
$ npm install
$ composer install
$ npm run watch 
```

### Configurar el archivo .env
Asegúrese de crear la base de datos y suministrar las credenciales correctas.

luego:
````sh
$ php artisan key:generate
$ php artisan migrate --seed
````
Cada vez que se crea un usuario se envia un correo de confirmación y otro correo con las credenciales de acceso, por lo tanto asegúrese de modificar la configuración de correos con dominio propio, gmail o cual quier otro.

Configuracion con gmail: 
````
MAIL_DRIVER=smtp
MAIL_HOST=smtp.googlemail.com
MAIL_PORT=587
MAIL_USERNAME=micorreo@gmail.com
MAIL_PASSWORD=*******
MAIL_ENCRYPTION=tls
MAIL_FROM_ADDRESS=micorreo@gmail.com
MAIL_FROM_NAME=Soporte
````
Para usar gmail debe habilitar [Acceso de apps menos seguras](https://support.google.com/accounts/answer/6010255?hl=es-419)

### Correr el proyecto
````
$ php artisan serve
Laravel development server started: <http://127.0.0.1:8000>
```` 
###### Abrir en el navegador [http://127.0.0.1:8000](http://127.0.0.1:8000 "http://127.0.0.1:8000") o [http://localhost:8000](http://localhost:8000 "http://localhost:8000")

