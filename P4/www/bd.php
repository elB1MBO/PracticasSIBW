<?php

    #Este script contiene todas mis funciones

    include_once("connect.php");

    class bd{
        public $mysqli;

        function __construct(){
            $this->mysqli = conectar();
        }

        function getMysqli(){
            return $this->mysqli;
        }

        //PRODUCTOS
        //Devuelve el producto correspondiente al id
        function getProducto($idPr){
            //Consulta a la BD:
            $stmt = $this->mysqli->prepare("SELECT * FROM productos WHERE id= ?");
            $stmt->bind_param("s", $idPr);
            $stmt->execute();
    
            $res = $stmt->get_result();
            if ($res->num_rows>0){
                $row = $res->fetch_assoc();
    
                $producto = array('nombre' => $row['nombre'], 'precio' => $row['precio'], 'descripcion' => $row['descripcion'], 
                'pr' => $idPr);
            }
    
            return $producto;
        }
        
        //Devuelve todos los eventos
        function getProductos(){
            $productos_tabla = $this->mysqli->query("SELECT * FROM productos");
            $productos = array();

            while($producto = $productos_tabla->fetch_assoc()){
                $productos[] = $producto;
            }
            return $productos;
        }

        function subirProducto($nombre, $precio, $desc, $etiqueta, $imagen, $iamgen_m){
            $stmt = $this->mysqli->prepare("INSERT INTO productos ('nombre', 'precio', 'descripcion', 'etiqueta') VALUES (?, ?, ?, ?)");
            $stmt->bind_param("ssss", $nombre, $precio, $desc, $etiqueta);
            $stmt->execute();

            //Para añadir la imagen, selecciono el id que se le haya asignado al producto nuevo
            $id = $this->mysqli->query("SELECT id from productos WHERE nombre=$nombre");
            $stmt = $this->mysqli->prepare("INSERT INTO imagenes ('imagen', 'imagen_marca', 'producto') VALUES (?, ?, ?)");
            $stmt->bind_param("sss", $imagen, $imagen_m, $id);
            $stmt->execute();
        }

        function crearProducto($nombre, $precio, $desc, $et){
            $stmt = $this->mysqli->prepare("INSERT INTO productos (nombres, precio, descripcion, etiqueta) VALUES (?, ?, ?, ?)");
            $stmt->bind_param("ssss", $nombre, $precio, $desc, $et);
            $stmt->execute();
        }

        function editarProducto($id, $nombre, $precio, $desc, $et){
            $stmt = $this->mysqli->prepare("UPDATE productos SET nombre=?, precio=?, descripcion=?, etiqueta=? WHERE id=?");
            $stmt->bind_param("sssss", $nombre, $precio, $desc, $et, $id);
            $stmt->execute();
        }

        function borrarProducto($id){
            $stmt = $this->mysqli->prepare("DELETE FROM productos WHERE id=?");
            $stmt->bind_param("s", $id);
            $stmt->execute();
        }

        //IMAGENES
        //Devuelve la imagen correspondiente al producto con el id pasado como argumento
        function getImages($idPr){

            $stmt = $this->mysqli->prepare("SELECT imagen, imagen_marca FROM imagenes WHERE id= ? ORDER BY id");
            $stmt->bind_param("s", $idPr);
            $stmt->execute();

            $res = $stmt->get_result();
            if ($res->num_rows>0){
                $row = $res->fetch_assoc();
                //echo $row['imagen'];
                $imagen = array('imagen' => $row['imagen'], 'marca' => ($row['imagen_marca']));
            }

            return $imagen;
        }

        //Devuelve todas las imagenes de la tabla
        function getAllImages(){
            $imagenes_tabla = $this->mysqli->query("SELECT * FROM imagenes");
            $imagenes = array();

            while($img = $imagenes_tabla->fetch_assoc()){
                $imagenes[] = $img;
            }
            return $imagenes;
        }

        //COMENTARIOS
        function getComment($id){    
            $stmt = $this->mysqli->prepare("SELECT * FROM comentarios WHERE id= ?");
            $stmt->bind_param("s", $id);
            $stmt->execute();
    
            $comentarios = $stmt->get_result();
            if ($comentarios->num_rows>0){
                $row = $comentarios->fetch_assoc();
    
                $comentario = array('id' => $row['id'], 'nombre' => $row['nombre'], 'email' => $row['email'], 
                'fecha' => $row['fecha'], 'comentario' => $row['comentario'], 'id_producto' => $row['id_producto']);
            }
    
            return $comentario;
        }

        function getBadWords(){
    
            $result = mysqli_query($this->mysqli, "SELECT * FROM palabrotas1");
    
            //Queremos obtener un array con todas las palabrotas de la base
            $palabrotas = array();
            while($row = $result->fetch_assoc()){
                $palabrotas[] = $row;
            }
            return $palabrotas;
            //echo json_encode($palabrotas);
        }

        //Para obtener todos los comentarios del producto
        function getComentarios($idPr){
            $stmt = $this->mysqli->prepare("SELECT * FROM comentarios WHERE id_producto=?");
            $stmt->bind_param("s", $idPr);
            $stmt->execute();

            $result = $stmt->get_result();

            $comentarios = array();
            if($result->num_rows > 0){
                while($row = $result->fetch_array()){
                    $comentarios[] = $row;
                }
            }
            return $comentarios;
        }

        //Devuelve todos los comentarios
        function getAllComentarios(){
            $tabla_comentarios = $this->mysqli->query("SELECT * FROM comentarios");
            $comentarios = array();

            while($comentario = $tabla_comentarios->fetch_assoc()){
                $comentarios[] = $comentario;
            }
            return $comentarios;
        }

        function cambiarComentario($id, $nuevoComentario){
            $stmt = $this->mysqli->prepare("UPDATE comentarios SET comentario=? WHERE id=?");
            $stmt->bind_param("ss", $nuevoComentario, $id);
            $stmt->execute();
        }

        function borrarComentario($id){
            $stmt = $this->mysqli->prepare("DELETE FROM comentarios WHERE id=?");
            $stmt->bind_param("s", $id);
            $stmt->execute();
        }

    }

?>