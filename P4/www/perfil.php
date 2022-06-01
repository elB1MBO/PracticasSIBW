<?php
    require_once "/usr/local/lib/php/vendor/autoload.php";
    include_once "connect.php";
    include_once "bdUsuarios.php";

    $loader = new \Twig\Loader\FilesystemLoader('templates');
    $twig = new \Twig\Environment($loader);

    $bdUs = new bdUsuarios();

    //Comprobamos si el usuario ha iniciado sesion 
    session_start();

    $usuario = array();

    
    if(isset($_SESSION["nombreUsuario"])){
        $usuario = $bdUs->getUsuario($_SESSION["nombreUsuario"]);
    }

    //Si el usuario desea cambiar su nombre de usuario (que NO es su id)
    if($_SERVER['REQUEST_METHOD'] === "POST"){
        $id = $usuario['user_id'];
        $nuevoNombre = $_POST['nuevoNombre'];
        $nuevoEmail = $_POST['nuevoEmail'];
        if($nuevoNombre != null){
            if($bdUs->getUsuario($_SESSION["nombreUsuario"] != null)){
                $bdUs->cambiarNombre($id, $nuevoNombre);
                $_SESSION['nombreUsuario'] = $nuevoNombre;
            }
        }
        if($nuevoEmail != null){
            if($bdUs->getUsuario($_SESSION["nombreUsuario"] != null)){
                $bdUs->cambiarEmail($id, $nuevoEmail);
            }
        }
        header("Location: perfil.php", true);
        exit();
    }
    

    echo $twig->render('perfil.html', ['usuario' => $usuario]);


    function alert_message($msg){
        echo "<script>alert('$msg');</script>";
    }
    
?>