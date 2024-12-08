<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nueva Categoria</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <?php
        error_reporting( E_ALL );
        ini_set( "display_errors", 1 ); 
        
        require('../util/conexion.php');

        session_start();
        if(!isset($_SESSION["usuario"])) {
            header("location: ../usuario/iniciar_sesion.php");
            exit;
        }
    ?>
    <link rel="stylesheet" href="../css/styles1.css">
</head>
<body>
    <div class="container">
        <?php
            $sql = "SELECT * FROM categorias";
            $resultado = $_conexion -> query($sql);
            $categoriaS = [];

            while($fila = $resultado -> fetch_assoc()) {
                array_push($categoriaS, $fila["categoria"]);
            }

            if($_SERVER["REQUEST_METHOD"] == "POST") {
                if (isset($_POST["nombre"])) {
                    $tmp_nombre = $_POST["nombre"];
                } else {
                    $err_nombre = "Nombre no seleccionada.";
                }
                $temp_descripcion = $_POST["descripcion"];

                // Validación Nombre
                $sql = "SELECT * FROM categorias WHERE categoria = '$tmp_nombre'";
                $resultado = $_conexion -> query($sql);
                if($resultado -> num_rows == 1){
                    $err_nombre = "Categoría ya creada.";
                } else{
                    if($tmp_nombre == "") {
                    $err_nombre = "Nombre obligatorio.";
                    } else{
                        if(!preg_match('/^[a-zA-ZáéíóúÁÉÍÓÚ\s]{2,30}$/', $tmp_nombre)){
                            $err_nombre = "El nombre solo puede contener letras y espacios en blanco.";
                        } else {
                            $nombre = $tmp_nombre;
                        }
                    }
                }
                // Validación Descripción
                if($temp_descripcion == ''){
                    $err_descripcion = 'La descripción es obligatoria.';
                } else{
                    if(strlen($temp_descripcion) > 255){
                        $err_descripcion = 'La descripción debe tener máximo 255 caracteres.';
                    } else{
                            $descripcion = $temp_descripcion;
                        }
                    }

                // Enviamos a la BBDD si tenemos las dos variables
                if(isset($nombre) && isset($descripcion)){
                    $sql = "INSERT INTO categorias (categoria, descripcion)
                    VALUES ('$nombre', '$descripcion')";
                    $_conexion -> query($sql);   
                }
                             
            }
        ?>
        <br><h3 class="title">Nueva Categoría</h3>
        <form action="" method="post" enctype="multipart/form-data">
            <div class="mb-3">
                <label class="form-label">Nombre</label>
                <input class="form-control" name="nombre" type="text">
                <?php
                    if(isset($err_nombre)) echo "<span class='error'>$err_nombre</span>";
                ?>
            </div>
            <div class="mb-3">
                <label class="form-label">Descripción</label>
                <input class="form-control" name="descripcion" type="text">
                <?php
                    if(isset($err_descripcion)) echo "<span class='error'>$err_descripcion</span>";
                ?>
            </div>
            <div class="mb-3">
                <a href="./index.php">
                    <input class="btn btn-primary" type="submit" value="Crear">
                </a>
                <a class="btn btn-secondary" href="./index.php">Volver</a>
            </div>
        </form>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>