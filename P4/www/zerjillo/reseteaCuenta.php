<?php
    session_start();
    unset($_SESSION['count']); //Resetea la variable "count" en la sesion actual
    
    //session_destroy(); Esto se cargaría toda la información relativa a la sesión, incluida la cookie que se usa

    phpinfo();

?>