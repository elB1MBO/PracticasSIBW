<?php

    require_once "/usr/local/lib/php/vendor/autoload.php";
    include_once("bdUsuarios.php");

    $loader = new \Twig\Loader\FilesystemLoader('templates');
    $twig = new \Twig\Environment($loader);

    $bdUs = new bdUsuarios();
    $mysqli = $bdUs->getMysqli();

    $name = $_POST['usernameR'];
    $email = $_POST['email'];
    $pass = $_POST['passwdR']; //el hash lo hago dentro de la clase bdUsuarios
    $tipo = 'normal';

    $bdUs->registrar($name, $pass, $email, $tipo);

    echo $twig->render("login.html", []);

?>