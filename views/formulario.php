<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="../css/bootstrap.min.css">


    <title>php2</title>
</head>
<body>


    <div class="container mt-5">

    <h1 class="text-center">Registro</h1>

        <form class="mt-3" id="registrarse" name="registro" method="POST" action="../controllers/guardar_usuario.php">
            <div class="row">
                <div class="col">
                <input  type="text" class="form-control" placeholder="nombres" name="nombres" id="nombres"
                autofocus required >
                </div>
                <div class="col">
                <input type="text" class="form-control" placeholder="apellidos" name="apellidos" 
                id="apellidos" required>
                </div>
            </div>

            <div class="row mt-3">
                <div class="col">
                <input  type="number" class="form-control" placeholder="telefono" name="telefono" 
                id="telefono" required minlength="10" >
                </div>
                <div class="col">
                <input type="email" class="form-control" placeholder="correo electronico"
                name="correo_electronico" id="correo_electronico" required>
                </div>
            </div>

            <div class="row mt-2">
                <div class="col">
                <label for="fecha_de_nacimiento">Fecha de nacimiento</label>
                <input  type="date" class="form-control" name="fecha_nacimiento"
                id="fecha_nacimiento" placeholder="fecha de nacimiento" required>
                </div>
                
            </div>

            <button type="submit" class="form-control  btn btn-primary mt-3 w-100" id="guardar_ususario" >
                Enviar
            </button>
        </form>

        <a  href="../index.php" class="btn btn-light mt-2 w-100 border-primary">Cancelar</a>
    </div>
    
    
    <script src="../js/bootstrap.min.js" ></script> 
</body>
</html>