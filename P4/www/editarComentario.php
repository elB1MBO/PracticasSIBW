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

    $comentario = $bd->getComment($idCom);

    //Si el usuario desea cambiar el comentario
    if($_SERVER['REQUEST_METHOD'] === 'POST'){
        $nuevoComentario = $_POST['comentario'];
        if($nuevoComentario != null){
            $bd->cambiarComentario($idCom, $nuevoComentario);
        }
        header("Location: gestionComentarios.php", true);
        exit();
    }

    echo $twig->render('editarComentario.html', ['comentario' => $comentario]);


    function alert_message($msg){
        echo "<script>alert('$msg');</script>";
    }
    
?>