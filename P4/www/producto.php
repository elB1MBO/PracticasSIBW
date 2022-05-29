<?php
    require_once "/usr/local/lib/php/vendor/autoload.php";
    include_once("bd.php");
    include_once("bdUsuarios.php");

    $loader = new \Twig\Loader\FilesystemLoader('templates');
    $twig = new \Twig\Environment($loader);

    $bd = new bd();
    $bdUs = new bdUsuarios();

    $mysqli = $bdUs->getMysqli();

    //Comprobamos si se ha iniciado sesión
    session_start();
    $usuario = array();
    if(isset($_SESSION["nombreUsuario"])){
        $usuario = $bdUs->getUsuario($_SESSION["nombreUsuario"]);
    }

    if(isset($_GET['pr'])){
        $idPr = $_GET['pr'];
    } else {
        $idPr = -1;
    }

    $producto = $bd->getProducto($idPr);
    $imagenes = $bd->getImages($idPr);
    $comentarios = $bd->getComentarios($idPr);
    $palabrotas = $bd->getBadWords();

    echo $twig->render('producto.html', ['usuario' => $usuario, 'producto' => $producto, 'imagenes' => $imagenes, 'comentarios' => $comentarios]);

?>