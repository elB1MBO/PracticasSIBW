<?php

    require_once "/usr/local/lib/php/vendor/autoload.php";

    $loader = new \Twig\Loader\FilesystemLoader('templates');
    $twig = new \Twig\Environment($loader);

    $variablesTwig = [];

    if($_SERVER['REQUEST_METHOD'] === 'POST'){
        if(isset($_FILES['imagen'])){
            $errores = array();
            $file_name = $_FILES['imagen']['name'];
            $file_size = $_FILES['imagen']['size'];
            $file_tmp = $_FILES['imagen']['tmp_name'];
            $file_type = $_FILES['imagen']['type'];
            $file_ext = strtolower(end(explode('.',$_FILES['imagen']['name'])));

            $extensions = array("jpeg", "jpg", "png");

            //Comprueba los errores que pueda haber

            //Comrpueba si la extension del archivo está entre las aceptadas
            if(in_array($file_ext, $extensions) === false){
                $errores[] = "Extensión no válida. Elija una imagen JPEG, JPG o PNG";
            }
            //Comprueba el tam del fichero
            if($file_size > 2097152){
                $errores[] = "Tamaño del fichero demasiado grande (máx. 2MB)";
            }
            //Comprueba si no ha habido errores
            if(empty($errores) === true){
                //Mueve el archivo de la carpeta temporal a la carpeta de imagenes subidas con el nombre dado por el usuario
                move_uploaded_file($file_tmp, "imagenesSubidas/".$file_name);
                $variablesTwig['imagen'] = "imagenesSubidas/".$file_name;
            }

            if(sizeof($errores) > 0){
                $variablesTwig['errores'] = $errores;
            }
        }
    }

    echo $twig->render("formulario.html", $variablesTwig);

?>