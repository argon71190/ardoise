<?php
// https://thomascavelier.ide.3wa.io/ide.html
// <script>document.location.href="https://www.youtube.com/watch?v=17vFHKwq8B8";</script>

session_start();

//var_dump($_SESSION);
//session_destroy();
// echo password_hash("1234Abc&", PASSWORD_DEFAULT);

spl_autoload_register(function($class) {
    require_once lcfirst(str_replace('\\', '/', $class)) . '.php';
});

$router = new App\Router();
$router->getRouteFromQuery();


// php -S localhost:8000