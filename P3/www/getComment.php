<?php
    include("connect.php");
    include("disconnect.php");
    $mysqli = conectar();

    //Recibimos por POST los datos procedentes del formulario
    $nombre = $_GET["name"];
    $email = $_GET["email"];
    $fecha = $_GET["fecha"];
    $comentario = $_GET["comentario"];

    $id = $_GET["id"];

    $result = mysqli_query($mysqli, "SELECT * FROM comentarios");

    $datos = array();
    while($row = mysqli_fetch_assoc($result)){
        $datos[] = $row;
    }

    echo json_encode($datos);

    //Cerramos conexion con la base de datos
    desconectar($mysqli);
    
?>

