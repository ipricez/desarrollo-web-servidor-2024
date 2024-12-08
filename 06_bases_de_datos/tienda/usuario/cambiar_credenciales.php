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
        
        session_start();
        if(!isset($_SESSION["usuario"])) {
            header("location: ./iniciar_sesion.php");
            exit;
        }
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
        $tmp_contrasena = $_POST["contrasena"];

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

        $usuario_actual = $_SESSION["usuario"];
        if(isset($contrasena)){
            $sql = "UPDATE usuarios
                    SET contrasena = '$contrasena_cifrada'
                    WHERE usuario = '$usuario_actual'";
                    $_conexion -> query($sql);
        }
    }
    ?>
    <div class="container d-flex justify-content-center align-items-center" style="height: 100vh;">
    <div class="text-center border p-4 rounded" style="border-color: #ccc;">
        <h1>Cambiar Contraseña</h1>
        <form class="col-4 mx-auto" action="" method="post" enctype="multipart/form-data">
            <div class="mb-3">
                <label class="form-label">Contraseña</label>
                <input class="form-control" name="contrasena" type="password">
                <?php
                    if(isset($err_contrasena)) echo "<span class='error'>$err_contrasena</span>";
                ?>
            </div>
            <div class="mb-3">
                <input class="btn btn-primary" type="submit" value="Actualizar">
            </div>
        </form>
        <a class="btn btn-secondary" href="./iniciar_sesion.php">Volver a Iniciar Sesión</a>
    </div>
</div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>