<?php

    require_once "/usr/local/lib/php/vendor/autoload.php";

    $loader = new \Twig\Loader\FilesystemLoader('templates');
    $twig = new \Twig\Environment($loader);

    include_once("bdUsuarios.php");

    $bdUs = new bdUsuarios();

    if($_SERVER['REQUEST_METHOD'] === "POST"){
        $nick = $_POST["name"];
        $pass = $_POST["pass"];
        
        if($bdUs->checkLogin($nick, $pass)){
            session_start();
            $_SESSION["nombreUsuario"] = $nick; //Guardamos en la sesión actual el nick del usuario logeado
            //alert_message("Ha iniciado sesión correctamente: ".$_SESSION['nombreUsuario']);
        }

        header("Location: perfil.php", true);
        exit();
    }
    echo $twig->render("login.html", []);

?>