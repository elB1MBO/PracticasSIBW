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

        function getComment($idPr){
            //Recibimos por POST los datos procedentes del formulario
            $nombre = $_GET["name"];
            $email = $_GET["email"];
            $fecha = $_GET["fecha"];
            $comentario = $_GET["comentario"];
    
            $stmt = $this->mysqli->prepare("SELECT * FROM comentarios WHERE id_producto= ? ORDER BY id");
            $stmt->bind_param("s", $idPr);
            $stmt->execute();
    
            $comentarios = array();
            while($row = $stmt->get_result()){
                $comentarios[] = $row;
            }
    
            return $comentarios;
            //echo json_encode($datos);
    
            //Cerramos conexion con la base de datos
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

        //Para obtener todos los comentarios de la tabla
        function getComentarios(){
            $stmt = $this->mysqli->prepare("SELECT * FROM comentarios");
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


        //Hay que añadir funciones para editar todos los campos que se dicen

        //Funcion para añadir producto
        function addProducto(){}


    }

?>