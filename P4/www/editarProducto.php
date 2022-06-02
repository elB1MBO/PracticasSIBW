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

    $producto = $bd->getProducto($idPr);


    //Si el usuario desea cambiar el comentario
    if($_SERVER['REQUEST_METHOD'] === 'POST'){
        $nuevoNombre = $_POST['nombre'];
        $nuevoPrecio = $_POST['precio'];
        $nuevaDescripcion = $_POST['descripcion'];
        $nuevaEtiqueta = $_POST['etiqueta'];

        //si algun campo es nulo, lo guarda con su valor anterior
        if($nuevoNombre == null){
            $nuevoNombre = $producto['nombre'];
        }
        if($nuevoPrecio == null){
            $nuevoPrecio = $producto['precio'];
        }
        if($nuevaDescripcion == null){
            $nuevaDescripcion = $producto['descripcion'];
        }
        if($nuevaEtiqueta == null){
            $nuevaEtiqueta = $producto['etiqueta'];
        }

        //Si el id no existe, significa que quiere crear un producto nuevo
        if($idPr === -1){
            $bd->crearProducto($nuevoNombre, $nuevoPrecio, $nuevaDescripcion, $nuevaEtiqueta);
        } else {
            $bd->editarProducto($idPr, $nuevoNombre, $nuevoPrecio, $nuevaDescripcion, $nuevaEtiqueta);
        }

        header("Location: gestionProductos.php", true);
        exit();
    }

    echo $twig->render('editarProducto.html', ['producto' => $producto]);

    function alert_message($msg){
        echo "<script>alert('$msg');</script>";
    }
?>