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
        $idCom = $_GET['id'];
    } else {
        $idCom = -1;
    }

    //Guardo el comentario antes de guardarlo para poder llamar a la página del producto de nuevo
    $comentario = $bd->getComment($idCom);
    //Borra el comentario (dentro de la funcion se comprueba el parametro)
    $bd->borrarComentario($idCom);

    header("Location: producto.php?pr=".$comentario['id_producto'], true);
    exit();

    
?>