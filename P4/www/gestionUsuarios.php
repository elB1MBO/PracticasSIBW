<?php

    require_once "/usr/local/lib/php/vendor/autoload.php";
    include_once "connect.php";
    include_once "bdUsuarios.php";

    $loader = new \Twig\Loader\FilesystemLoader('templates');
    $twig = new \Twig\Environment($loader);

    $bdUs = new bdUsuarios();

    //Comprobamos si el usuario ha iniciado sesion 
    session_start();

    $usuario = array();
    $usuarios = array();

    if(isset($_SESSION["nombreUsuario"])){
        $usuario = $bdUs->getUsuario($_SESSION["nombreUsuario"]);
        $usuarios = $bdUs->getUsuarios();
    }

    echo $twig->render('gestionUsuarios.html', ['usuario' => $usuario, 'usuarios' => $usuarios]);

?>
