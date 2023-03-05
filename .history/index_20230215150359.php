<?php
// https://thomascavelier.ide.3wa.io/ide.html
// <script>document.location.href="https://www.youtube.com/watch?v=17vFHKwq8B8";</script>

session_start();

//var_dump($_SESSION);
//session_destroy();
// echo password_hash("1234Abc&", PASSWORD_DEFAULT);

spl_autoload_register(function($class) {
    // spl_autoload_register détecte l'instanciation d'une classe (et du namespace dont fait partie cette classe)
    // Lorsqu'on écrit : new NamespaceName\ClassName()
    // spl_autoload_register comprends qu'on instancie une classe qui s'appelle 'ClassName' qui fait partie du namspace qui s'appelle 'NamespaceName'
    // il transmet donc 'NamespaceName\ClassName' à la fonction qu'il prend en parametre
    // cette fonction le récupère et l'utilise comme etant la variable $class
    // $class = 'NamespaceName\ClassName'

    // Comme on veut require_once le fichier de la classe dès qu'une classe est instanciée
    // On va ranger nos fichiers de classe dans des dossiers qui ont le même nom que le namespace
    // comme $class = 'NamespaceName\ClassName' et que le fichier de la classe a pour chemin 'namespacename/ClassName.php'
    // il faut transformer les antislash de $class en slash, et la majuscule en minuscule
    // une fois que c'est fait on concatène '.php' a la suite
    // on ajoute require_once devant le tout

    require_once lcfirst(str_replace('\\', '/', $class)) . '.php';
});

$router = new App\Router();
$router->getRouteFromQuery();


// php -S localhost:8000