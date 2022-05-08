<?php
    include("connect.php");
    function getImage($idPr){
        #Este script sirve para devolver los datos de la imagen
        
        $mysqli = conectar();

        $stmt = $mysqli->prepare("SELECT imagen FROM galeria WHERE id= ? ORDER BY id");
        $stmt->bind_param("s", $idPr);
        $stmt->execute();

        $res = $stmt->get_result();
        if ($res->num_rows>0){
            $row = $res->fetch_assoc();
            echo $row['imagen'];
            $imagen = array('imagen' => $row['imagen'], 'marca' => imagecreatefromstring($row['marca']));
        }

        //Cerramos conexion con la base de datos
        desconectar($mysqli);

        return $imagen;
    }

    function getMarca($idPr){
        $mysqli = conectar();

        $stmt = $mysqli->prepare("SELECT marca FROM galeria WHERE id= ? ORDER BY id");
        $stmt->bind_param("s", $idPr);
        $stmt->execute();

        $res = $stmt->get_result();
        if ($res->num_rows>0){
            $row = $res->fetch_assoc();
            echo $row['marca'];
        }

        //Cerramos conexion con la base de datos
        desconectar($mysqli);
    }

    //guardamos en la bd una referencia a la imagen, en vez de un blob
?>