<?php

    //Este php recibirá como argumento el id del usuario que hay que editar
    require_once "/usr/local/lib/php/vendor/autoload.php";
    include_once "connect.php";
    include_once "bdUsuarios.php";

    $loader = new \Twig\Loader\FilesystemLoader('templates');
    $twig = new \Twig\Environment($loader);

    $bdUs = new bdUsuarios();

    //Comprobamos si el usuario ha iniciado sesion 
    session_start();

    $usuario = array();

    if(isset($_GET['id'])){
        $idUs = $_GET['id'];
    } else {
        $idUs = -1;
    }

    $usuario = $bdUs->getUsuario($idUs);

    if($_SERVER["REQUEST_METHOD"] === "POST"){
        $nuevoNombre = $_POST['name'];
        $nuevoTipo = $_POST['tipo'];

        if($nuevoNombre != null){
            $bdUs->cambiarNombre($idUs, $nuevoNombre);
        }
        if($nuevoTipo != null && comprobarTipo($nuevoTipo)){
            //Si el tipo del usuario que va a cambiar es super, comprueba que haya más super usuarios
            if($usuario["tipo"] === "super" && $bdUs->numSuperUsuarios() == 0){
                //Un super usuario no puede cambiar su tipo de usuario, debe hacerlo otro superusuario
                header("Location: gestionUsuarios.php", true);
                exit();
            }
            $bdUs->cambiarTipoUsuario($_SESSION["nombreUsuario"], $idUs, $nuevoTipo);
        }
        header("Location: gestionUsuarios.php", true);
        exit();
    }
    
    echo $twig->render('editarUsuario.html', ['usuario' => $usuario]);

    //Comprueba que el nuevo tipo de usuario que va a introducir es válido
    function comprobarTipo($tipo){
        $tipos_usuario = ["normal", "gestor", "moderador", "super"];
        if(in_array($tipo, $tipos_usuario))
            return true;
        else
            return false;
    }

?>