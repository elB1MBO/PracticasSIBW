<?php
    require_once "/usr/local/lib/php/vendor/autoload.php";
    include_once("bd.php");
    include_once("bdUsuarios.php");

    $loader = new \Twig\Loader\FilesystemLoader('templates');
    $twig = new \Twig\Environment($loader);

    $bd = new bd();
    $bdUs = new bdUsuarios();

    session_start();

    $usuario = [];

    if(isset($_SESSION["nombreUsuario"])){
        $usuario = $bdUs->getUsuario($_SESSION["nombreUsuario"]);
    }

    $productos = $bd->getProductos();
    $imagenes = $bd->getAllImages();

    echo $twig->render('portada.html', ['usuario' => $usuario, 'productos' => $productos, 'imagenes' => $imagenes]);
?>