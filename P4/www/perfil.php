<?php
    require_once "/usr/local/lib/php/vendor/autoload.php";

    $loader = new \Twig\Loader\FilesystemLoader('templates');
    $twig = new \Twig\Environment($loader);

    $mysqli = conectar();

    //$name = ; Habra que pasarle a este php el nombre del usuario que se ha identificado en login

    $stmt = $mysqli->prepare("SELECT * FROM usuarios WHERE user_id = '$name'");
    $stmt->bind_param("s", $name);
    $stmt->execute();

    $res = $stmt->get_result();
    if ($res->num_rows>0){
        $row = $res->fetch_assoc();
        //echo $row['imagen'];
        $usuario = array('nombre' => $row['user_id'], 'pass' => $row['password'], 
        'email' => $row['email'], 'tipo' => $row['tipo']);
    }

    //Cerramos conexion con la base de datos
    desconectar($mysqli);
    

    echo $twig->render('perfil.html', ['usuario' => $usuario]);
?>