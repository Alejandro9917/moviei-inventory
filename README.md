
# Documentation

## MySQL

Crear una base de datos MySQL llamada movie-inventory
con el formato utf8mb4_unicode_ci.

## Crear archivo .env

Copiar archivo .env.example y modificar los parametros 
para conectar con la base de datos.
 
## Compilar estilos

Ejecutar el comando $ npm install && npm run dev

## Levantar servidor de aplicación

Ejecutar el comando $ php artisan serve

## Rutas

### Cliente
    / -> ruta base para clientes
    /client/login -> utilizada para mostrar y manejar el login
    /client/movie -> utilizada para mostrar películas disponibles
    /client/rent/{movie_id}/{client_id} -> utilizada para crear un alquiler de cliente-película

### Admin
    /home -> redirige al login para admin y al panel de administración

Dentrol de panel de administración se puede acceder a todas 
las rutas y vistas utilizadas para manejar los datos