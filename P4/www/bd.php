<?php

    #Este script contiene todas mis funciones

    include_once("connect.php");

    #Devuelve el producto correspondiente al id
    function getProducto($idPr){
        #Consulta a la BD:
        $mysqli = conectar();

        $stmt = $mysqli->prepare("SELECT * FROM productos WHERE id= ?");
        $stmt->bind_param("s", $idPr);
        $stmt->execute();

        $res = $stmt->get_result();
        if ($res->num_rows>0){
            $row = $res->fetch_assoc();

            $producto = array('nombre' => $row['nombre'], 'precio' => $row['precio'], 'descripcion' => $row['descripcion'], 
            'pr' => $idPr);
        }

        //Cerramos conexion con la base de datos
        desconectar($mysqli);

        return $producto;
    }

    #Devuelve la imagen correspondiente al producto con el id pasado como argumento
    function getImages($idPr){

        $mysqli = conectar();

        $stmt = $mysqli->prepare("SELECT imagen, imagen_marca FROM imagenes WHERE id= ? ORDER BY id");
        $stmt->bind_param("s", $idPr);
        $stmt->execute();

        $res = $stmt->get_result();
        if ($res->num_rows>0){
            $row = $res->fetch_assoc();
            //echo $row['imagen'];
            $imagen = array('imagen' => $row['imagen'], 'marca' => ($row['imagen_marca']));
        }

        //Cerramos conexion con la base de datos
        desconectar($mysqli);

        return $imagen;
    }

    /* function getComment(){
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
    } */

    /* function getBadWords(){
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
    } */

?>