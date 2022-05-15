<?php
    require_once "/usr/local/lib/php/vendor/autoload.php";
    include_once("bd.php");
    #include_once("getImages.php");

    $loader = new \Twig\Loader\FilesystemLoader('templates');
    $twig = new \Twig\Environment($loader);

    $nombreProducto = "Producto por defecto";
    $precioProducto = "0€";
    $idPr = 0;

    if(isset($_GET['pr'])){
        $idPr = $_GET['pr'];
    } else {
        $idPr = -1;
    }

    $producto = getProducto($idPr);
    $imagenes = getImages($idPr);
    echo $twig->render('producto.html', ['producto' => $producto, 'imagenes' => $imagenes]);

?>