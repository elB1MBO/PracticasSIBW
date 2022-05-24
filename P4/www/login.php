<?php
    require_once "/usr/local/lib/php/vendor/autoload.php";
    include_once "connect.php";

    $loader = new \Twig\Loader\FilesystemLoader('templates');
    $twig = new \Twig\Environment($loader);

    $mysqli = conectar();

    login();

    /* $name = $_POST['usernameR'];
    $email = $_POST['email'];
    $pass = $_POST['passwdR'];
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
        echo '<script type="text/javascript">
            alert("Usuario registrado con éxito.");
        </script>';
    } else if ($res->num_rows == 1) {
        //Si ya hay una entrada con ese nombre de usuario, no le deja registrarse con ese nombre
        echo '<script type="text/javascript">
            alert("Error: Nombre de usuario en uso, introduzca otro nombre de usuario.");
        </script>';
    } */

    //Cerramos conexion con la base de datos
    desconectar($mysqli);

    function login(){
        $mysqli = conectar();

        $name = $_POST['usernameL'];
        $pass = $_POST['passwdL'];

        //Comprobamos que el usuario existe primero
        $stmt = $mysqli->prepare("SELECT * from usuarios WHERE user_id = ?");
        $stmt->bind_param("s", $name);
        $stmt->execute();
        $res = $stmt->get_result();
        if($res->num_rows == 0){
            alert_message("Error: nombre de usuario no existe.");
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
                $usuario = array('nombre' => $row['user_id'], 'pass' => $row['password'], 
                'email' => $row['email'], 'tipo' => $row['tipo']);
                echo $twig->render('perfil.html', ['usuario' => $usuario]);
            }
        }

        //Cerramos conexion con la base de datos
        desconectar($mysqli);
    }

    function register(){
        $mysqli = conectar();

        $name = $_POST['usernameR'];
        $email = $_POST['email'];
        $pass = $_POST['passwdR'];
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
    }


    function alert_message($msg){
        echo "<script>alert('$msg');</script>";
    }

    echo $twig->render('login.html', []);
?>