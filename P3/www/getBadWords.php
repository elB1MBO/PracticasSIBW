<?php

    $mysqli = new mysqli("mysql", "usuario1", "user1", "SIBW");

    if($mysqli->connect_errno){
        echo("Fallo al conectarse a la base de datos: " . $mysqli->connect_errno);
    }

    //$palabrotas = $_GET["palabrota"];

    $result = mysqli_query($mysqli, "SELECT * FROM palabrotas1");

    //Queremos obtener un array con todas las palabrotas de la base
    $palabrotas = array();
    while($row = mysqli_fetch_assoc($result)){
        $palabrotas[] = $row;
    }

    echo json_encode($palabrotas);

    //Cerramos conexion con la base de datos
    //include("desconectar.php);

    //guardamos en la bd una referencia a la imagen, en vez de un blob
?>