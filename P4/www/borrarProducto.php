<?php
    require_once "/usr/local/lib/php/vendor/autoload.php";
    include_once "connect.php";
    include_once "bd.php";

    $loader = new \Twig\Loader\FilesystemLoader('templates');
    $twig = new \Twig\Environment($loader);

    $bd = new bd();

    //Comprobamos si el usuario ha iniciado sesion 
    session_start();

    if(isset($_GET['id'])){
        $idPr = $_GET['id'];
    } else {
        $idPr = -1;
    }

    //Guardo el comentario antes de guardarlo para poder llamar a la página del producto de nuevo
    $producto = $bd->getProducto($idPr);
    //Borra el comentario (dentro de la funcion se comprueba el parametro)
    $bd->borrarProducto($idPr);

    header("Location: gestionProductos.php", true);
    exit();

    
?>