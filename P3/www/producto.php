<<<<<<< HEAD
<?php
    require_once "/usr/local/lib/php/vendor/autoload.php";
    include("bd.php");
    //include("getImage.php");

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
    //$imagen = getImage($idPrid);
    echo $twig->render('producto.html', ['producto' => $producto]);

=======
<?php
    require_once "/usr/local/lib/php/vendor/autoload.php";
    include("bd.php");
    //include("getImage.php");

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
    //$imagen = getImage($idPrid);
    echo $twig->render('producto.html', ['producto' => $producto]);

>>>>>>> efba46876a1d77ba8b06926a03f314919d4e38cf
?>