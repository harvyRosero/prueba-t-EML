<?php 

    // CONEXION SQL 
    $mysqli = new mysqli("localhost", "root", "root", "empresa2");
    if ($mysqli->connect_errno) {
        echo "Fallo al conectar a MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
    }
?>