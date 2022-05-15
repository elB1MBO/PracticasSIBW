<?php
    include("connect.php");
    #include("disconnect.php");
    $mysqli = conectar();

    //$palabrotas = $_GET["palabrota"];

    $result = mysqli_query($mysqli, "SELECT * FROM palabrotas1");

    //Queremos obtener un array con todas las palabrotas de la base
    $palabrotas = array();
    while($row = mysqli_fetch_assoc($result)){
        $palabrotas[] = $row;
    }

    echo json_encode($palabrotas);

    //Cerramos conexion con la base de datos
    desconectar($mysqli);

?>