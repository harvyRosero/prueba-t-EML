<?php 
    require '../models/conexion_sql.php';

    // OBTENER LOS VALORES DEL FORMULARIO DE REGISTRO 
    $nombres = $mysqli->real_escape_string($_POST['nombres']);
    $apellidos = $mysqli->real_escape_string($_POST['apellidos']);
    $telefono = $mysqli->real_escape_string($_POST['telefono']);
    $correo_electronico = $mysqli->real_escape_string($_POST['correo_electronico']);
    $fecha_nacimiento = $mysqli->real_escape_string($_POST['fecha_nacimiento']);
    $fecha_registro = date('y-m-d');


    // TRAER DATOS DE USUARIO FILTRADO POR SU CORREO 
    $consulta = "SELECT gmail FROM usuarios WHERE gmail='$correo_electronico'";
    $resultado2 = $mysqli-> query($consulta);
    $fila = $resultado2-> fetch_assoc();

    //VALIDAR SI EL CORREO YA ESTA REGISTRADO 
    if($fila == 0){
        $sql = "INSERT INTO usuarios(nombres, apellidos, telefono, gmail, fecha_nacimiento, 
        fecha_registro, estado, fecha_modificacion) VALUES ('$nombres', 
        '$apellidos', '$telefono', '$correo_electronico', '$fecha_nacimiento', '$fecha_registro', 
        'Activo', 0000-00-00 )";
        $resultado = $mysqli->query($sql);

        if($resultado > 0 ){

            echo 
            "<!DOCTYPE html>
            <html lang='en'>
                <head>
                    <meta charset='UTF-8>
                    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
                    <meta name='viewport' content='width=device-width, initial-scale=1.0'>
                    

                    <link rel='stylesheet' href='../css/bootstrap.min.css'>
                    <link rel='stylesheet' href='../css/pop_ups.css'>
                </head>
                <body>

                    <div class='vmodal'>
                        <div class='contenido container mt-5 alert alert-success' role='alert'>
                            <h4 class='alert-heading'>Datos guardados correctamente!</h4>
                            <p>Ahora puedes ver los cambios realizados en la pagina principal.</p>
                            <hr>
                            <a href='../index.php' class='btn btn-success'>Ver cambios</a>
                        </div>
                    </div>

                    <script src='../js/bootstrap.min.js' ></script>
                </body>
            </html>";
        }else{
            echo "<!DOCTYPE html>
            <html lang='en'>
            <head>
                <meta charset='UTF-8>
                <meta http-equiv='X-UA-Compatible' content='IE=edge'>
                <meta name='viewport' content='width=device-width, initial-scale=1.0'>
                <title>Document</title>

                <link rel='stylesheet' href='../css/bootstrap.min.css'>
                <link rel='stylesheet' href='../css/pop_ups.css'>
            </head>
            <body >

                <div class='vmodal'>
                    <div class='contenido container mt-5 alert alert-danger' role='alert'>
                        <h4 class='mt-4 alert-heading'>Error!</h4>
                        <p>No se pudo guardar los datos, por favor intentelo otra vez.</p>
                        <hr>
                        <a href='../index.php' class='btn btn-danger'>Ver cambios</a>
                    </div>
                </div>

                <script src='../js/bootstrap.min.js' ></script>
            </body>
            </html>";
        }
        
    }else{
        echo "<!DOCTYPE html>
            <html lang='en'>
            <head>
                <meta charset='UTF-8>
                <meta http-equiv='X-UA-Compatible' content='IE=edge'>
                <meta name='viewport' content='width=device-width, initial-scale=1.0'>
                <title>Document</title>

                <link rel='stylesheet' href='../css/bootstrap.min.css'>
                <link rel='stylesheet' href='../css/pop_ups.css'>
            </head>
            <body>
                <div class='vmodal'>
                    <div class='contenido container mt-5 alert alert-danger' role='alert'>
                        <h4 class='mt-4 alert-heading'>Error!</h4>
                        <p>Este correo electronico ya existe.</p>
                        <hr>
                        <a href='../index.php' class='btn btn-danger'>Volver</a>
                    </div>
                </div>

                <script src='../js/bootstrap.min.js' ></script>
            </body>
            </html>";
            
        
    }

    


?>