<?php 

    // CONEXION SQL 
    $mysqli = new mysqli("sql205.epizy.com", "epiz_29914276", "SgplCipyC9", "epiz_29914276_pruebaeml");
    if ($mysqli->connect_errno) {
        echo "Fallo al conectar a MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
    }
?>