<?php
    require_once "/usr/local/lib/php/vendor/autoload.php";
    include("getImages.php");

    $loader = new \Twig\Loader\FilesystemLoader('templates');
    $twig = new \Twig\Environment($loader);

    $imagen = "";
    $idPr = 0;

    if(isset($_GET['pr'])){
        $idPr = $_GET['pr'];
    } else {
        $idPr = -1;
    }

    $imagen = getImage($idPr);

    echo $twig->render('producto.html', ['imagen' => $imagen]);

?>