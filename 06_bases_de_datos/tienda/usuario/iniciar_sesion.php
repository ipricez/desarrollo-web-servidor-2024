<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Iniciar sesión</title>
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
    if($_SERVER["REQUEST_METHOD"] == "POST") {
        $usuario = $_POST["usuario"];
        $contrasena = $_POST["contrasena"];

        $sql = "SELECT * FROM usuarios WHERE usuario = '$usuario'";
        $resultado = $_conexion -> query($sql);
        //var_dump($resultado);
        if($resultado -> num_rows == 0) {
            $err_usuario = "El usuario no existe";
        } else {
            $info_usuario = $resultado -> fetch_assoc();
            $acceso_concedido = password_verify($contrasena,$info_usuario["contrasena"]);
            if(!$acceso_concedido) {
                $err_contrasena = "Contraseña incorrecta";
            } else {
                session_start();
                $_SESSION["usuario"] = $usuario;
                header("location: ../index.php");
            }
        }
    }
    ?>
    <div class="container d-flex justify-content-center align-items-center" style="height: 100vh;">
    <div class="text-center border p-4 rounded" style="border-color: #ccc;">
        <h1>Iniciar sesión</h1>
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
                <input class="btn btn-primary" type="submit" value="Iniciar sesión">
            </div>
        </form>
        <h3>O, si aún no tienes cuenta, regístrate</h3>
        <a class="btn btn-secondary" href="registro.php">Registrarse</a>
        <a class="btn btn-secondary" href="../index.php">Volver a Inicio</a>
    </div>
</div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>