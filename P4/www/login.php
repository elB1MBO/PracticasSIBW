<?php
    require_once "/usr/local/lib/php/vendor/autoload.php";
    include_once "connect.php";
    include_once("bdUsuarios.php");

    $loader = new \Twig\Loader\FilesystemLoader('templates');
    $twig = new \Twig\Environment($loader);


    //Creamos una instancia de nuestra clase bdUsuarios
    $bdUs = new bdUsuarios();

    $mysqli = $bdUs->getMysqli();

    $nombre = $_POST["usernameL"];
    $pass = $_POST["passwdL"];

    if($bdUs->checkLogin($nombre, $pass)){
        session_start();
        //Guardamos la sesión actual en el nombre del usuario logeado
        $_SESSION["nombreUsuario"] = $nombre; 

        header("location:index.php");
    } else {
        //Si falla al hacer login, comunica el fallo
        $password = $bdUs->getPassword($nombre);
        if(password_verify($pass, $password)){
            alert_message("Error, contraseña incorrecta.");
        }
    }

    //login();

    //Cerramos conexion con la base de datos
    desconectar($mysqli);

    echo $twig->render('login.html', []);

    //Funcion para imprimir un mensaje de alerta por pantalla
    function alert_message($msg){
        echo "<script>alert('$msg');</script>";
    }

    function login(){
        $mysqli = conectar();

        if($_SERVER['REQUEST_METHOD'] === "POST"){
            $name = $_POST['usernameL'];
            $pass = $_POST['passwdL'];
        
            //Comprobamos que el usuario existe primero
            $stmt = $mysqli->prepare("SELECT * from usuarios WHERE user_id = ?");
            $stmt->bind_param("s", $name);
            $stmt->execute();
            $res = $stmt->get_result();
            if($res->num_rows == 0){
                //alert_message("Error: nombre de usuario no existe.");
            }else{
                //Si el nombre de usuario es válido, comprueba la contraseña
                $stmt = $mysqli->prepare("SELECT * from usuarios WHERE password = ?");
                $stmt->bind_param("s", $pass);
                $stmt->execute();
                $res = $stmt->get_result();
                if($res->num_rows == 0){
                    alert_message("Error: contraseña incorrecta.");
                }else{
                    $loader = new \Twig\Loader\FilesystemLoader('templates');
                    $twig = new \Twig\Environment($loader);
                    $row = $res->fetch_assoc();
                    $usuario = array('nombre' => $row['username'], 'pass' => $row['password'], 
                    'email' => $row['email'], 'tipo' => $row['tipo']);

                    //Guarda la sesion del usuario en la aplicacion
                    session_start();
                    $_SESSION["user_id"] = $usuario['nombre'];
                    
                    echo $twig->render('perfil.html', ['usuario' => $usuario]);
                }
            }
        }

        //Cerramos conexion con la base de datos
        desconectar($mysqli);
    }

    /* function register(){
        $mysqli = conectar();

        $name = $_POST['usernameR'];
        $email = $_POST['email'];
        $pass = password_hash($_POST['passwdR'], PASSWORD_DEFAULT);
        $tipo = 'normal';

        $stmt = $mysqli->prepare("SELECT * FROM usuarios WHERE user_id = ?");
        $stmt->bind_param("s", $name);
        $stmt->execute();

        $res = $stmt->get_result();
        if ($res->num_rows == 0) {
            $stmt = $mysqli->prepare("INSERT INTO usuarios (user_id, password, email, tipo) 
                    VALUES (?, ?, ?, ?)"); //Por defecto, se registran como usuario normal.
            $stmt->bind_param("ssss", $name, $pass, $email, $tipo);
            $stmt->execute();
            alert_message("Usuario registrado con éxito");
            //te lleva a perfil.php
        } else if ($res->num_rows == 1) {
            //Si ya hay una entrada con ese nombre de usuario, no le deja registrarse con ese nombre
            alert_message("Error: Nombre de usuario en uso, introduzca otro nombre de usuario.");
        }
    } */


    

    
?>