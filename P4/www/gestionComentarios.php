<?php

    require_once "/usr/local/lib/php/vendor/autoload.php";
    include_once "connect.php";
    include_once "bdUsuarios.php";
    include_once "bd.php";

    $loader = new \Twig\Loader\FilesystemLoader('templates');
    $twig = new \Twig\Environment($loader);

    $bdUs = new bdUsuarios();
    $bd = new bd();

    //Comprobamos si el usuario ha iniciado sesion 
    session_start();

    $usuario = array();
    $comentarios = array();

    if(isset($_SESSION["nombreUsuario"])){
        $usuario = $bdUs->getUsuario($_SESSION["nombreUsuario"]);
        $comentarios = $bd->getAllComentarios();
    }

    echo $twig->render('gestionComentarios.html', ['usuario' => $usuario, 'comentarios' => $comentarios]);

?>
