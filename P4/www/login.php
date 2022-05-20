<?php
    require_once "/usr/local/lib/php/vendor/autoload.php";
    include_once "connect.php";

    $loader = new \Twig\Loader\FilesystemLoader('templates');
    $twig = new \Twig\Environment($loader);


    session_start();

    $mysqli = conectar();

    $name = $_POST['username'];
    $email = $_POST['email'];
    $pass = $_POST['passwd'];

    /* $stmt = $mysqli->prepare("SELECT * FROM usuarios WHERE user_id = 'name'");
    $stmt->bind_param("s", $name);
    $stmt->execute();

    $res = $stmt->get_result();
    if ($res->num_rows==0){ 
        $stmt = $mysqli->prepare("INSERT INTO usuarios (user_id, password, email, tipo) 
        VALUES ('$name', '$pass', '$email', 'Normal')"); //Por defecto, se registran como usuario normal.
        $stmt->bind_param("s", $name, $pass, $email);
        $stmt->execute();
    } else if($res->num_rows==1){
        //Si ya hay una entrada con ese nombre de usuario, no le deja registrarse con ese nombre
        echo "Error: nombre de usuario en uso.";
    } */

    //Cerramos conexion con la base de datos
    desconectar($mysqli);

    function login(){
        $mysqli = conectar();

        $name = $_POST['username'];
        $email = $_POST['email'];
        $pass = $_POST['passwd'];

        $stmt = $mysqli->prepare("SELECT * FROM usuarios WHERE user_id = 'name'");
        $stmt->bind_param("s", $name);
        $stmt->execute();

        $res = $stmt->get_result();
        if ($res->num_rows==0){ 
            $stmt = $mysqli->prepare("INSERT INTO usuarios (user_id, password, email, tipo) 
            VALUES ('$name', '$pass', '$email', 'normal')"); //Por defecto, se registran como usuario normal.
            $stmt->bind_param("s", $name, $pass, $email);
            $stmt->execute();
        } else if($res->num_rows==1){
            //Si ya hay una entrada con ese nombre de usuario, no le deja registrarse con ese nombre
            echo "Error: nombre de usuario en uso.";
        }

        //Cerramos conexion con la base de datos
        desconectar($mysqli);
    }

    function register(){

    }

    echo $twig->render('login.html', []);
?>