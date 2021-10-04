<?php 
    require '../models/conexion_sql.php';

    // PARA BORRAR REGISTRO DE USUARIO 
    $id = $mysqli->real_escape_string($_GET['id']);
    $sql = "DELETE FROM usuarios WHERE id='$id' ";
    $resultado = $mysqli->query($sql);

    if($resultado > 0){
        // ALERTA EXITOSA 
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
                        <div class='contenido container mt-5 alert alert-success' role='alert'>
                            <h4 class='alert-heading'>Datos eliminados correctamente!</h4>
                            <p>Ahora puedes ver los cambios realizados en la pagina principal.</p>
                            <hr>
                            <a href='../index.php' class='btn btn-success'>Ver cambios</a>
                        </div>
                    </div>

                    <script src='../js/bootstrap.min.js' ></script>
                </body>
            </html>";
    }else{  
        // ALERTA ERRONEA 
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
                        <h4 class='mt-4 alert-heading'>Error al eliminar!</h4>
                        <p>ocurrio un error inesperado por favor vuelva a intentarlo.</p>
                        <hr>
                        <a href='../index.php' class='btn btn-danger'>Ver cambios</a>
                    </div>
                </div>
             

                <script src='../js/bootstrap.min.js' ></script>
            </body>
            </html>";
    }
?>