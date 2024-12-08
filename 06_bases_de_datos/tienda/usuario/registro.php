<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <?php
        error_reporting( E_ALL );
        ini_set( "display_errors", 1 ); 
        
        require('../util/conexion.php');
    ?>
    <link rel="stylesheet" href="../css/styles1.css">
</head>
<body>
    <?php
    $sql = "SELECT * FROM usuarios";
    $resultado = $_conexion -> query($sql);
    $lista_usuarios = [];
    while($fila = $resultado -> fetch_assoc()) {
        array_push($lista_usuarios, $fila["usuario"]);
    }

    if($_SERVER["REQUEST_METHOD"] == "POST") {
        $tmp_usuario = $_POST["usuario"];
        $tmp_contrasena = $_POST["contrasena"];      

        // Validamos usuario
        $sql = "SELECT * FROM usuarios WHERE usuario = '$tmp_usuario'";
        $resultado = $_conexion -> query($sql);
        if($resultado -> num_rows == 1){
            $err_usuario = "Usuario en uso.";
        } else{
            if($tmp_usuario == "") {
                $err_usuario = "Usuario obligatorio.";
            } else{
                if(!preg_match('/^[a-zA-Z0-9]{3,15}$/', $tmp_usuario)){
                    $err_usuario = "Solo se permiten entre 3 y 15 caracteres. Letras y números.";
                } else {
                    $usuario = $tmp_usuario;
                }
            }
        }
        // Validamos contraseña
        if($tmp_contrasena == ""){
            $err_contrasena = "Contraseña obligatoria.";
        } else{
            if(!preg_match( '/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*\W).{8,15}$/', $tmp_contrasena)){
            $err_contrasena = "8 y 15 caracteres. Letras mayúsculas y minúsculas. Algún número y carac especial.";
            } else{
                $contrasena = $tmp_contrasena;
                // Ciframos contraseña
                $contrasena_cifrada = password_hash($contrasena, PASSWORD_DEFAULT);
            }
        }

        if(isset($usuario) && isset($contrasena)){
            $sql = "INSERT INTO usuarios VALUES ('$usuario', '$contrasena_cifrada')";
            $_conexion -> query($sql);
        }
    }
    ?>
    <div class="container d-flex justify-content-center align-items-center" style="height: 100vh;">
    <div class="text-center border p-4 rounded" style="border-color: #ccc;">
        <h1>Formulario de registro</h1>
        <form class="col-4 mx-auto" action="" method="post" enctype="multipart/form-data">
            <div class="mb-3">
                <label class="form-label">Usuario</label>
                <input class="form-control" name="usuario" type="text">
                <?php
                    if(isset($err_usuario)) echo "<span class='error'>$err_usuario</span>";
                ?>
            </div>
            <div class="mb-3">
                <label class="form-label">Contraseña</label>
                <input class="form-control" name="contrasena" type="password">
                <?php
                    if(isset($err_contrasena)) echo "<span class='error'>$err_contrasena</span>";
                ?>
            </div>
            <div class="mb-3">
                <input class="btn btn-primary" type="submit" value="Registarse">
            </div>
        </form>
        <h3>O, si ya tienes cuenta, inicia sesión</h3>
        <a class="btn btn-secondary" href="iniciar_sesion.php">Iniciar sesión</a>
        <a class="btn btn-secondary" href="../index.php">Volver a Inicio</a>
    </div>
</div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>