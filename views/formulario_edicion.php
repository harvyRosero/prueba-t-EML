<?php
    require '../models/conexion_sql.php';

    // TRAER DATOS DE USUARIO DE LA BASE DE DATOS 
    $id = $mysqli->real_escape_string($_GET['id']);
    $sql = "SELECT nombres, apellidos, telefono, gmail, estado, fecha_nacimiento FROM usuarios WHERE id=$id LIMIT 1";
    $resultado = $mysqli->query($sql);

    $fila = $resultado->fetch_assoc();

?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="../css/bootstrap.min.css">

    <title>Edicion</title>
</head>


<body>
    <div class="container mt-5">

    <h1 class="text-center">Editar usuario</h1>

    <!-- Formulario reesponsive -->

        <form class="mt-3" id="editar" name="editar" method="POST" 
        action="../controllers/editar_usuario.php">
            <div class="row">

                <input type="hidden" class="form-control" name="_id" id="_id"
                autofocus required value="<?php echo $id  ?>" >

                <div class="col">
                <input type="text" class="form-control" placeholder="nombres" name="nombres" id="nombres"
                autofocus required value="<?php echo $fila['nombres'];  ?>" >
                </div>
                <div class="col">
                <input type="text" class="form-control" placeholder="apellidos" name="apellidos" 
                id="apellidos" required value="<?php echo $fila['apellidos'];  ?>" >
                </div>
            </div>

            <div class="row mt-3">
                <div class="col">
                <input type="number" class="form-control" placeholder="telefono" name="telefono" 
                id="telefono" required value="<?php echo $fila['telefono'];  ?>" >
                </div>
                <div class="col">
                <input type="email" class="form-control" placeholder="correo electronico"
                name="correo_electronico" id="correo_electronico" required value="<?php echo $fila['gmail'];  ?>" >
                </div>
            </div>

            <div class="row mt-2">
                <div class="col">
                <label for="fecha_de_nacimiento">Fecha de nacimiento</label>
                <input type="date" class="form-control" name="fecha_nacimiento"
                id="fecha_nacimiento" placeholder="fecha de nacimiento" required value="<?php echo $fila['fecha_nacimiento'];  ?>" >
                </div>

                <div class="col">
                <label for="estado">Estado</label>
                <select class="form-control" id="estado" name="estado">
                    <?php if($fila['estado'] == 'Activo'){ ?>
                            <option value="Activo">Activo</option>
                            <option value="Inactivo">Inactivo</option>
                        <?php } else{ ?>
                            <option value="Inactivo">Inactivo</option>
                            <option value="Activo">Activo</option>
                            
                        <?php  }?>
                        
                    ?>
                    
                </select>
                </div>
                
            </div>

            <button type="submit" class="form-control  btn btn-success mt-3 w-100" id="editar_usuario" >
                Guardar cambios
            </button>
        </form>

        <!-- boton volver  -->

        <a  href="../index.php" class="btn btn-light mt-2 w-100">Cancelar</a>
    </div>
    
    
    <script src="../js/bootstrap.min.js" ></script> 
</body>
</html>