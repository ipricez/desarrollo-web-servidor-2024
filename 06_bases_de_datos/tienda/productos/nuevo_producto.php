<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nuevo Producto</title>
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
            $productitos = [];

            while($fila = $resultado -> fetch_assoc()) {
                array_push($productitos, $fila["categoria"]);
            }

            if($_SERVER["REQUEST_METHOD"] == "POST") {
                $temp_nombre = $_POST["nombre"];
                $temp_precio = $_POST["precio"];
                if (isset($_POST["categoria"])) {
                    $temp_categoria = $_POST["categoria"];
                } else {
                    $err_categoria = "Categoría no seleccionada.";
                }
                $temp_stock = $_POST["stock"];
                $temp_descripcion = $_POST["descripcion"];

                // Validación Nombre
                if($temp_nombre == ''){
                    $err_nombre = 'El nombre es obligatorio.';
                } else{
                    if(strlen($temp_nombre) < 2 || strlen($temp_nombre) > 50){
                        $err_nombre = 'El nombre debe tener entre 2 y 50 caracteres.';
                    } else{
                        $patron = '/^[a-zA-ZáéíóúÁÉÍÓÚ0-9\s]{2,50}$/';
                        if(!preg_match($patron,$temp_nombre)){
                            $err_nombre = 'El nombre solo puede contener letras, números y espacios en blanco.';
                        } else{
                            $nombre = $temp_nombre;
                        }
                    }
                }
                // Validación Precio
                if($temp_precio==""){
                    $err_precio = "Es obligatorio.";
                } else{
                    if(filter_var($temp_precio,FILTER_VALIDATE_FLOAT) == false &&
                    filter_var($temp_precio,FILTER_VALIDATE_INT) == false){
                        $err_precio = "Debe ser un número.";
                    } else{
                        if(!preg_match('/^[0-9]{1,4}(\.[0-9]{1,2})?$/', $temp_precio)){
                        $err_precio = 'Entre 0 y 6 dígitos y como máximo 2 decimales.';
                        } else{
                            $precio = $temp_precio;
                        }
                    }
                }
                // Validación Stock
                if ($temp_stock == '') {
                    $stock = 0;
                } else {
                    if (filter_var($temp_stock, FILTER_VALIDATE_FLOAT) === false &&
                    filter_var($temp_stock, FILTER_VALIDATE_INT) === false) {
                        $err_stock = "Debe ser un número.";
                    } else {
                        if (!preg_match('/^[0-9]{1,3}$/', $temp_stock)) {
                            $err_stock = 'Mínimo 0 y máximo 3 dígitos.';
                        } else {
                            $stock = $temp_stock;
                        }
                    }
                }
                // Validación Categoria
                if(isset($temp_categoria)){
                    if(in_array($temp_categoria,$productitos)){
                        $categoria = $temp_categoria;
                    } else {
                        $err_categoria = "Categoría invalida.";
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
                // Validación Imagenes
                // $_FILES, QUE ES UN ARRAY DOBLE!!!
                $direccion_temporal = $_FILES["imagen"]["tmp_name"];
                $nombre_imagen = $_FILES["imagen"]["name"];

                if(strlen($nombre_imagen)>60){
                    $err_imagen = "El nombre no puede superar 60 caracteres.";
                } else {
                    $imagencorrecta = "Funciona";
                    move_uploaded_file($direccion_temporal, to: "../imagenes/$nombre_imagen");
                }

                // Enviamos a la BBDD si tenemos las dos variables
                if(isset($nombre) && isset($precio) && isset($stock) && isset($categoria) && isset($descripcion)  && isset($imagencorrecta)){
                    $sql = "INSERT INTO productos (nombre, precio, categoria, stock, descripcion, imagen)
                    VALUES ('$nombre','$precio', '$categoria', '$stock','$descripcion','../imagenes/$nombre_imagen')";
                    $_conexion -> query($sql);   
                }
            }         
            
        ?>
        <br><h3 class="title">Crear Producto</h3>
        <form action="" method="post" enctype="multipart/form-data">
            <div class="mb-3">
                <label class="form-label">Nombre</label>
                <input class="form-control" name="nombre" type="text">
                <?php
                    if(isset($err_nombre)) echo "<span class='error'>$err_nombre</span>";
                ?>
            </div>
            <div class="mb-3">
                <label class="form-label">Precio</label>
                <input class="form-control" name="precio" type="text">
                <?php
                    if(isset($err_precio)) echo "<span class='error'>$err_precio</span>";
                ?>
            </div>
            <div class="mb-3">
                <label class="form-label">Categoria</label>
                <select class="form-select" name="categoria">
                    <option value="paco" selected disabled hidden>Selecciona uno</option>
                    <?php foreach($productitos as $productito){ ?>
                        <option value="<?php echo $productito ?>">
                            <?php echo $productito ?>
                        </option>
                    <?php } ?>
                </select>
                <?php
                    if(isset($err_categoria)) echo "<span class='error'>$err_categoria</span>";
                ?>
            </div>
            <div class="mb-3">
                <label class="form-label">Stock</label>
                <input class="form-control" name="stock" type="text">
                <?php
                    if(isset($err_stock)) echo "<span class='error'>$err_stock</span>";
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
                <label class="form-label">Imagen</label>
                <input class="form-control" name="imagen" type="file">
                <?php
                    if(isset($err_imagen)) echo "<span class='error'>$err_imagen</span>";
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