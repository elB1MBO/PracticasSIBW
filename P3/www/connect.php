<?php
//Función que nos conecta a la base de datos con nuestro usuario y contraseña
    function conectar(){
        $mysqli = new mysqli("mysql", "usuario1", "user1", "SIBW");

        if($mysqli->connect_errno){
            echo("Fallo al conectarse a la base de datos: " . $mysqli->connect_errno);
        }
        return $mysqli;
    }

?>