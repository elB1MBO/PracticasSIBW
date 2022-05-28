<?php
    require_once "/usr/local/lib/php/vendor/autoload.php";
    include("bd.php");

    $loader = new \Twig\Loader\FilesystemLoader('templates');
    $twig = new \Twig\Environment($loader);

    $bd = new bd();

    if(isset($_GET['pr'])){
        $idPr = $_GET['pr'];
    } else {
        $idPr = -1;
    }

    $producto = $bd->getProducto($idPr);
    $producto = $bd->getProducto($idPr);
    $imagenes = $bd->getImages($idPr);
    $comentarios = $bd->getComentarios($idPr);
    //$imagen = getImage($idPrid);
    echo $twig->render('producto_imprimir.html', ['producto' => $producto, 'imagenes' => $imagenes, 'comentarios' => $comentarios]);
?>