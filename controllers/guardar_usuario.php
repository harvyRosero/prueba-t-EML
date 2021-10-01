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
            echo "<!DOCTYPE html>
            <html lang='en'>
                <head>
                    <meta charset='UTF-8>
                    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
                    <meta name='viewport' content='width=device-width, initial-scale=1.0'>
                    <title>Document</title>

                    <link rel='stylesheet' href='../css/bootstrap.min.css'>
                </head>
                <body>
                    <div class='container mt-5 alert alert-success' role='alert'>
                    <h4 class='alert-heading'>Datos Guardados correctamente!</h4>
                    <p>Ahora puedes ver los cambios realizados en la pagina principal.</p>
                    <hr>
                    <a href='../index.php' class='btn btn-success'>Ver cambios</a>
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
            </head>
            <body >

            <svg xmlns='http://www.w3.org/2000/svg' style='display: none;'>
                <symbol id='check-circle-fill' fill='currentColor' viewBox='0 0 16 16'>
                    <path d='M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z'/>
                </symbol>
                <symbol id='info-fill' fill='currentColor' viewBox='0 0 16 16'>
                    <path d='M8 16A8 8 0 1 0 8 0a8 8 0 0 0 0 16zm.93-9.412-1 4.705c-.07.34.029.533.304.533.194 0 .487-.07.686-.246l-.088.416c-.287.346-.92.598-1.465.598-.703 0-1.002-.422-.808-1.319l.738-3.468c.064-.293.006-.399-.287-.47l-.451-.081.082-.381 2.29-.287zM8 5.5a1 1 0 1 1 0-2 1 1 0 0 1 0 2z'/>
                </symbol>
                <symbol id='exclamation-triangle-fill' fill='currentColor' viewBox='0 0 16 16'>
                    <path d='M8.982 1.566a1.13 1.13 0 0 0-1.96 0L.165 13.233c-.457.778.091 1.767.98 1.767h13.713c.889 0 1.438-.99.98-1.767L8.982 1.566zM8 5c.535 0 .954.462.9.995l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 5.995A.905.905 0 0 1 8 5zm.002 6a1 1 0 1 1 0 2 1 1 0 0 1 0-2z'/>
                </symbol>
            </svg>

                <div class='container  col-6 mt-5 alert alert-danger d-flex align-items-center' role='alert'>
                    <svg class='bi flex-shrink-0 me-2' width='24' height='24' role='img' aria-label='Danger:'><use xlink:href='#exclamation-triangle-fill'/></svg>
                    <div>
                        -ERROR- Este correo ya esta registrado!. 
                    </div>
                    <hr>
                    <div class=''>
                        <a href='../index.php' class='btn btn-danger'>Volver</a>
                    </div>
                    
                </div>

                <script src='../js/bootstrap.min.js' ></script>
            </body>
            </html>";
        }
        
    }else{
        echo "esta correo electronico ya esta registrado";
    }

    


?>