<?php
    //Archivo de prueba para entender las sesiones
    require_once "/usr/local/lib/php/vendor/autoload.php";

    $loader = new \Twig\Loader\FilesystemLoader('templates');
    $twig = new \Twig\Environment($loader);

    session_start(); 
    /**
     * session_start comprueba si se ha inicializado una sesión con anteriordad
     * En caso afirmativo, rellena la variable $_SESSION con la info que tenía.
     * Mira en la cabecera si está la cookie con la sesión del usuario.
    */

    if(!isset($_SESSION['count'])){ //Si no esta iniciado el campo count, lo inicia
        $_SESSION['count'] = 1;
    } else { //Si ya estaba iniciado, lo aumenta
        $_SESSION['count']++;
    }

    echo $twig->render('contador.html', ["cuenta" => $_SESSION['count']]);

?>