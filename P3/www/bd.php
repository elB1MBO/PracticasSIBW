<?php
    include("connect.php");
    include("disconnect.php");

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
?>