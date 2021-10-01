<?php 
    require 'models/conexion_sql.php';

    // TRAER REGISTRO DE LOS USUARIOS REGISTRADOS 

    $sql = "SELECT id, nombres, apellidos, telefono, gmail, fecha_nacimiento, 
    fecha_registro, estado, fecha_modificacion FROM usuarios ";

    $result =$mysqli->query($sql);

?>


<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/jquery.dataTables.min.css">

    <script src="js/jquery-3.6.0.min.js" ></script>
    <script src="js/bootstrap.min.js" ></script>
    <script src="js/jquery.dataTables.min.js" ></script>

    <script>
        $(document).ready(function() {
            $('#tabla').DataTable();
        } );
    </script>



    <title>formulario</title>
</head>
<body>
    <div class="container mt-5 mb-5">

    <h2 class="text-center">Lista de usuarios</h2>


        <div class="row justify-content-center">
            <a class="btn btn-success w-50 mb-5 mt-4" href="views/formulario.php">Registrarse</a>
        </div>

        <table id="tabla" class="display mb-2 responsive nowrap" style="width:100%">
            <thead>
                <tr>
                    <th>Nombres</th>
                    <th>Apellidos</th>
                    <th>Telefono</th>
                    <th>Email</th>
                    <th> F d Nacimiento</th>
                    <th>F d Registro</th>
                    <th>Estado</th>
                    <th>F d Modificacion</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                <?php while($fila = $result->fetch_assoc()) {
                    if ($fila['estado'] == 'Activo'){
                    ?>
                    <tr>
                        <td style="background-color:#bbffbe"> <?php echo $fila['nombres']; ?> </td>
                        <td style="background-color:#bbffbe"> <?php echo $fila['apellidos']; ?></td>
                        <td style="background-color:#bbffbe"> <?php echo $fila['telefono']; ?></td>
                        <td style="background-color:#bbffbe"> <?php echo $fila['gmail']; ?></td>
                        <td style="background-color:#bbffbe"> <?php echo $fila['fecha_nacimiento']; ?></td>
                        <td style="background-color:#bbffbe"> <?php echo $fila['fecha_registro']; ?></td>
                        <td style="background-color:#bbffbe"><?php echo $fila['estado']; ?></td>
                        <td ><?php echo $fila['fecha_modificacion']; ?>
                        <a href="views/formulario_edicion.php?id=<?php echo $fila['id']; ?>"
                        class="btn btn-info">Editar</a> 
                        </td>
                        <td>
                        <a
                        class="btn btn-secondary">Eliminar</a>
                        </td>
                        
                    </tr>
                <?php
                }else { ?> 
                    <tr>
                        <td style="background-color:#FFC7C7"> <?php echo $fila['nombres']; ?> </td>
                        <td style="background-color:#FFC7C7" > <?php echo $fila['apellidos']; ?></td>
                        <td style="background-color:#FFC7C7" > <?php echo $fila['telefono']; ?></td>
                        <td style="background-color:#FFC7C7"> <?php echo $fila['gmail']; ?></td>
                        <td style="background-color:#FFC7C7" > <?php echo $fila['fecha_nacimiento']; ?></td>
                        <td style="background-color:#FFC7C7" > <?php echo $fila['fecha_registro']; ?></td>
                        <td style="background-color:#FFC7C7" ><?php echo $fila['estado']; ?></td>
                        <td  ><?php echo $fila['fecha_modificacion']; ?>
                        <a  href="views/formulario_edicion.php?id=<?php echo $fila['id']; ?>"
                        class="btn btn-info">Editar</a> 
                        </td>
                        <td>
                        <a href="controllers/eliminar_usuario.php?id=<?php echo $fila['id']; ?>"
                        class="btn btn-danger">Eliminar</a> 
                        </td>
                        
                    </tr>
                <?php
                }
                } ?>
            </tbody>
        </table>
        
    </div>
    

</body>
</html>