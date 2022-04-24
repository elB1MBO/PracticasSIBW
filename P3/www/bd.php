<<<<<<< HEAD
<?php
    function getProducto($idPr){
        #Consulta a la BD:
        $mysqli = new mysqli("mysql", "usuario1", "user1", "SIBW");
        if($mysqli->connect_errno){
            echo("Fallo al conectarse a la base de datos: " . $mysqli->connect_errno);
        }

        $stmt = $mysqli->prepare("SELECT nombre, precio, descripcion FROM productos WHERE id= ?");
        $stmt->bind_param("s", $idPr);
        $stmt->execute();

        $res = $stmt->get_result();
        if ($res->num_rows>0){
            $row = $res->fetch_assoc();

            $producto = array('nombre' => $row['nombre'], 'precio' => $row['precio'], 'descripcion' => $row['descripcion'], 'pr' => $idPr);
        }
        return $producto;
    }
=======
<?php
    function getProducto($idPr){
        #Consulta a la BD:
        $mysqli = new mysqli("mysql", "usuario1", "user1", "SIBW");
        if($mysqli->connect_errno){
            echo("Fallo al conectarse a la base de datos: " . $mysqli->connect_errno);
        }

        $stmt = $mysqli->prepare("SELECT nombre, precio FROM productos WHERE id= ?");
        $stmt->bind_param("s", $idPr);
        $stmt->execute();

        $res = $stmt->get_result();
        if ($res->num_rows>0){
            $row = $res->fetch_assoc();

            $producto = array('nombre' => $row['nombre'], 'precio' => $row['precio'], 'pr' => $idPr);
        }
        return $producto;
    }
>>>>>>> efba46876a1d77ba8b06926a03f314919d4e38cf
?>