<?php
    require_once "/usr/local/lib/php/vendor/autoload.php";

    $loader = new \Twig\Loader\FilesystemLoader('templates');
    $twig = new \Twig\Environment($loader);

    $nombreProducto = "Producto por defecto";
    $precioProducto = "0€";

    if ($_GET['pr'] == 1) {
        $nombreProducto = "Mistela";
        $precioProducto = "10'95€/1L";
    } else if($_GET['pr'] == 2) {
        $nombreProducto = "Zurrapa de lomo";
        $precioProducto = "5€/500gr";
    }

    echo $twig->render('producto_imprimir.html', ['nombre' => $nombreProducto, 'precio' => $precioProducto]);
?>