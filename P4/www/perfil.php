<?php
    require_once "/usr/local/lib/php/vendor/autoload.php";
    include_once "connect.php";
    include_once "bdUsuarios.php";

    $loader = new \Twig\Loader\FilesystemLoader('templates');
    $twig = new \Twig\Environment($loader);

    $bdUs = new bdUsuarios();
    $mysqli = $bdUs->getMysqli();

    //Comprobamos si el usuario ha iniciado sesion 
    session_start();

    $usuario = array();

    if(isset($_SESSION["nombreUsuario"])){
        $usuario = $bdUs->getUsuario($_SESSION["nombreUsuario"]);
    }

    //Si el usuario desea cambiar su nombre de usuario (que NO es su id)
    $nombre = $usuario['username'];
    $nuevoNombre = $_POST['nuevoNombre'];

    if($nuevoNombre != null){
        if($bdUs->getUsuario($_SESSION["nombreUsuario"] != null)){
            $bdUs->cambiarNombre($nombre, $nuevoNombre);
            $_SESSION['nombreUsuario'] = $nuevoNombre;
        }
    }

    echo $twig->render('perfil.html', ['usuario' => $usuario]);
    
?>