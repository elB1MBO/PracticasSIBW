<?php
    function getProducto($idPr){
        #Consulta a la BD:
        $mysqli = new mysqli("mysql", "usuario1", "user1", "SIBW");
        if($mysqli->connect_errno){
            echo("Fallo al conectarse a la base de datos: " . $mysqli->connect_errno);
        }

        $stmt = $mysqli->prepare("SELECT * FROM productos WHERE id= ?");
        $stmt->bind_param("s", $idPr);
        $stmt->execute();

        $res = $stmt->get_result();
        if ($res->num_rows>0){
            $row = $res->fetch_assoc();

            $producto = array('nombre' => $row['nombre'], 'precio' => $row['precio'], 'descripcion' => $row['descripcion'], 
            'pr' => $idPr, 'imagen' => $row['imagen'], 'imagen2' => $row['imagen2']);
        }
        return $producto;
    }
?>