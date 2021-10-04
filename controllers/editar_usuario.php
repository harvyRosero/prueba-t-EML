<?php 
    require '../models/conexion_sql.php';

    // EXTRAER DATOS DEL FORMULARIO DE EDICION   
    $id = $mysqli->real_escape_string($_POST['_id']);
    $nombres = $mysqli->real_escape_string($_POST['nombres']);
    $apellidos = $mysqli->real_escape_string($_POST['apellidos']);
    $telefono = $mysqli->real_escape_string($_POST['telefono']);
    $correo_electronico =  $mysqli->real_escape_string($_POST['correo_electronico']);
    $fecha_nacimiento =  $mysqli->real_escape_string($_POST['fecha_nacimiento']);
    $fecha_modificacion =  date('y-m-d');
    $estado = $mysqli->real_escape_string($_POST['estado']);

    // ACTUALIZAR REGIsTRO EN LA BASE DE DATOS
    $sql = "UPDATE usuarios SET nombres='$nombres', apellidos='$apellidos', 
    telefono='$telefono', gmail='$correo_electronico', fecha_nacimiento='$fecha_nacimiento',
    fecha_modificacion='$fecha_modificacion', estado='$estado' WHERE id='$id' ";

    $resultado = $mysqli->query($sql);

    if($resultado > 0){
        
        // CREACION DE ALERTA EXITOSA
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
            

            <div >
                    <div class='vmodal'>
                        
                        
                        <div class='contenido container mt-5 alert alert-success' role='alert'>
                            <h4 class='heading alert-heading'>Datos actualizados correctamente!</h4>
                            <p>Ahora puedes ver los cambios realizados en la pagina principal.</p>
                            <hr>
                            <a href='../index.php' class='btn btn-success'>Ver cambios</a>
                        </div>
                    </div>
            </div>

            <script src='../js/bootstrap.min.js' ></script>
        </body>
        </html>";
    }else{
        // CREACION DE ALERTA ERRONEA 
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
            <div >
                    <div class='vmodal'>
                        <div class='contenido container mt-5 alert alert-danger' role='alert'>
                            <h4 class='mt-4 alert-heading'>Error al actualizar!</h4>
                            <p>ocurrio un error inesperado por favor verifique sus datos.</p>
                            <hr>
                            <a href='../index.php' class='btn btn-danger'>Ver cambios</a>
                        </div>
                    </div>

                    
            </div>

            <script src='../js/bootstrap.min.js' ></script>
        </body>
        </html>";
    }

?>
