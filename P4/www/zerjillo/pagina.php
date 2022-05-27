<?php

    require_once "/usr/local/lib/php/vendor/autoload.php";

    $loader = new \Twig\Loader\FilesystemLoader('templates');
    $twig = new \Twig\Environment($loader);

    require_once "bdUsuarios.php";

    $variablesTwig = [];

    session_start();

    if(isset($_SESSION["nickUsuario"])){
        $variablesTwig["user"] = getUser($_SESSION["nickUsuario"]);
    }

    echo $twig->render("pagina.html", $variablesTwig);

?>