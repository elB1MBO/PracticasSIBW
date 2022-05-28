<?php

    include_once("connect.php");

    //En este clase definiré las funciones necesarias para la gestión de usuarios
    class bdUsuarios{
        public $mysqli;

        //hay que definir el constructor
        function __construct(){
            $this->mysqli = conectar();
        }

        function getMysqli(){
            return $this->mysqli;
        }

        function registrar($nombre, $password, $email, $tipo){
            if($this->getUsuario($nombre) != null){ //Si el usuario existe, no puede registrarse otra vez
                return false;
            }

            $pass_hash = password_hash($password, PASSWORD_DEFAULT);

            $stmt = $this->mysqli->prepare("INSERT INTO usuarios (user_id, password, email, tipo, username) 
                    VALUES (?, ?, ?, ?, ?)"); //Por defecto, se registran como usuario normal.
            $stmt->bind_param("sssss", $nombre, $pass_hash, $email, $tipo, $nombre);
            $stmt->execute();

            //$sql = "INSERT INTO `usuarios` (`user_id`, `password`, `email`, `tipo`, `username`) VALUES ($nombre, $pass_hash, $email, $tipo, $nombre) ";
        }

        function getUsuario($nombre){
            $stmt = $this->mysqli->prepare("SELECT * from usuarios where user_id=?");
            $stmt->bind_param("s", $nombre);
            $stmt->execute();

            $res = $stmt->get_result();
            $usuario = array();
            while($resultado = $res->fetch_assoc()){
                $usuario = $resultado;
            }
            return $usuario;
        }

        function getPassword($username){
            $usuario = array();
            $usuario = $this->getUsuario($username);
            return $usuario["password"];
        }

        function checkLogin($username, $pass){
            $usuario = array();
            $usuario = $this->getUsuario($username);
            if(password_verify($pass, $usuario["password"])){
                return true;
            }
            return false;
        }

        function cambiarNombre($nombre, $nuevoNombre){
            $stmt = $this->mysqli->prepare("UPDATE usuarios SET username=? WHERE username=?");
            $stmt->bind_param("ss", $nuevoNombre, $nombre);
            $stmt->execute();
        }

        function cambiarPass($pass, $nuevaPass){
            $stmt = $this->mysqli->prepare("UPDATE usuarios SET password=? WHERE password=?");
            $stmt->bind_param("ss", $nuevaPass, $pass);
            $stmt->execute();
        }

        function cambiarEmail($email, $nuevoEmail){
            $stmt = $this->mysqli->prepare("UPDATE usuarios SET email=? WHERE email=?");
            $stmt->bind_param("ss", $nuevoEmail, $email);
            $stmt->execute();
        }

        //El único que puede cambiar el tipo de un usuario es el superuser, que no puede cambiarse a si mismo
        function cambiarTipoUsuario($superid, $userid, $nuevoTipo){
            if($superid == $userid){
                return false;
            } else {
                $stmt = $this->mysqli->prepare("UPDATE usuarios SET tipo=? WHERE user_id=?");
                $stmt->bind_param("ss", $nuevoTipo, $userid);
                $stmt->execute();
            }
            return true;
        }

        //Devuelve todos los usuarios de la tabla
        function getUsuarios(){
            $users_table = $this->mysqli->query("SELECT * FROM usuarios");
            $usuarios = array();

            //Guardamos los usuarios de la tabla en el array
            while($user = $users_table->fetch_assoc()){
                $usuarios[] = $user;
            }
            return $usuarios;
        }

    }

?>