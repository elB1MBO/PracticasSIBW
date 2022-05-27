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

    echo $twig->render('perfil.html', ['usuario' => $usuario]);

    /* $mysqli = conectar();

    //$name = ; Habra que pasarle a este php el nombre del usuario que se ha identificado en login

    $stmt = $mysqli->prepare("SELECT * FROM usuarios WHERE user_id = ?");
    $stmt->bind_param("s", $name);
    $stmt->execute();

    $res = $stmt->get_result();
    if ($res->num_rows>0){
        $row = $res->fetch_assoc();
        //echo $row['imagen'];
        $usuario = array('nombre' => $row['username'], 'pass' => $row['password'], 
        'email' => $row['email'], 'tipo' => $row['tipo']);
    }

    //Cerramos conexion con la base de datos
    desconectar($mysqli); */
    

    
?>