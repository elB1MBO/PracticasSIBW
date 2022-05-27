<?php

    $passwordSuperUser = password_hash('1234', PASSWORD_DEFAULT);
    $passwordNormalUser = password_hash('4321', PASSWORD_DEFAULT);

    $usuarios = [["nick"=>"Raul", "pass"=>$passwordSuperUser, "super"=>true],
    ["nick"=>"Bimbo", "pass"=>$passwordNormalUser, "super"=>false]];

    //Devuelve true si existe un usuario con esa contraseña
    function checkLogin($nick, $pass){
        global $usuarios;
        for($i = 0; $i < sizeof($usuarios); $i++){
            if($usuarios[$i]["nick"] === $nick){
                if(password_verify($pass, $usuarios[$i]["pass"])){
                    return true;
                }
            }
        }
        return false;
    }

    //Devuelve la info de un usuario a partir de su nick
    function getUser($nick){
        global $usuarios;
        for($i=0; $i<sizeof($usuarios); $i++){
            if($usuarios[$i]["nick"] === $nick){
                return $usuarios[$i];
            }
        }
    }

?>