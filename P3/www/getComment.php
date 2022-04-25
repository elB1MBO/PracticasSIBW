<?php

    $mysqli = new mysqli("mysql", "usuario1", "user1", "SIBW");

    if($mysqli->connect_errno){
        echo("Fallo al conectarse a la base de datos: " . $mysqli->connect_errno);
    }

    //Recibimos por POST los datos procedentes del formulario
    $nombre = $_GET["name"];
    $email = $_GET["email"];
    $fecha = $_GET("fecha");
    $comentario = $_GET["comentario"];

    $id = $_GET["id"];

    //Abrimos la conexión a la base de datos
    //include("conectar.php");
    $_LEER_SQL = "SELECT * FROM $comentarios WHERE $id = $producto.id";
    $stmt = $mysqli->prepare($_LEER_SQL);
    $stmt->execute();

    $res = $stmt->get_result();
    if(!$res)
        echo "No se pudo leer correctamente el comentario";
    else
        echo "-------LEIDO--------";
    //Cerramos conexion con la base de datos
    //include("desconectar.php);

?>