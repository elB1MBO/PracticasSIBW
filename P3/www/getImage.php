<?php

    include("connect.php");

    #Este script sirve para devolver los datos de la imagen
    
    if(isset($_GET['pr'])){
        $idPr = $_GET['pr'];
    } else {
        $idPr = -1;
    }
    //$idPr = getIdPr();
    
    $mysqli = conectar();

    $stmt = $mysqli->prepare("SELECT imagen FROM productos WHERE id= ?");
    $stmt->bind_param("s", $idPr);
    $stmt->execute();

    $res = $stmt->get_result();

    if ($res->num_rows>0){
        $row = $res->fetch_assoc();
        echo $row['imagen'];
    }

    //guardamos en la bd una referencia a la imagen, en vez de un blob
?>