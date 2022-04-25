<?php

    $nombre = $_POST['name'];
    $email = $_POST['email'];
    $comentario = $_POST['comment'];

    //Ya se comprueba en createComment de js si los campos son correctos, luego
    //en este php solo tenemos que mandar los datos a la BD
    echo json_encode('Correcto: Nombre: '.$nombre.' Email: '.$email.' Comentario: '.$comentario);

/*     //Crea la conexion
    $mysqli = new mysqli("mysql", "usuario1", "user1", "SIBW");
    //Comprueba la conexion
    if($mysqli->connect_errno){
        echo("Fallo al conectarse a la base de datos: " . $mysqli->connect_errno);
    }

    $nombre = $_POST['name'];
    $email = $_POST['email'];
    $fecha = $_POST['fecha'];
    $comentario = $_POST['comment'];

    $sql = "INSERT INTO SIBW (nombre, email, fecha, comentario) 
        VALUES ($nombre, $email, $fecha, $comentario)";

    if($mysqli->query($sql) === TRUE){
        echo "Nuevo comentario añadido correctamente";
    } else {
        echo "Error: " . $sql . "<br>" . $mysqli->error;
    }

    $mysqli->close(); */

?>