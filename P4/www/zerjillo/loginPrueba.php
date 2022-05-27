<?php

    require_once "/usr/local/lib/php/vendor/autoload.php";

    $loader = new \Twig\Loader\FilesystemLoader('templates');
    $twig = new \Twig\Environment($loader);

    require_once "bdUsuarios.php";

    if($_SERVER['REQUEST_METHOD'] === "POST"){
        $nick = $_POST["nick"];
        $pass = $_POST["pass"];
        
        if(checkLogin($nick, $pass)){
            session_start();
            $_SESSION["nickUsuario"] = $nick; //Guardamos en la sesión actual el nick del usuario logeado
        }

        header("Location: pagina.php");
        exit();
    }
    echo $twig->render("loginPrueba.html", []);

?>