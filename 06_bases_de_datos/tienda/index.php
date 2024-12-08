<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tienda</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <?php
        error_reporting( E_ALL );
        ini_set( "display_errors", 1 ); 

        require('./util/conexion.php');

        session_start();
    ?>
    <link rel="stylesheet" href="./css/styles1.css">
</head>
<body>
    <?php
        if (isset($_SESSION["usuario"])) { ?>
            <h3>Bienvenid@ <?php echo $_SESSION["usuario"] ?></h3>
            <div class="links-container">
                <div class="left-links">
                    <a class="btn btn-secondary" href="./productos/index.php">Productos</a>
                    <a class="btn btn-secondary" href="./categorias/index.php">Categorías</a>
                </div>
                <div class="right-links">
                    <a class="btn btn-secondary" href="./usuario/cerrar_sesion.php">Cerrar sesión</a>
                    <a class="btn btn-secondary" href="./usuario/cambiar_credenciales.php">Cambiar contraseña</a>
                </div>
            </div>
    <?php } else { ?>
            <div class="iniciarSesion">
                <a class="btn btn-secondary" href="./usuario/iniciar_sesion.php">Iniciar sesión</a>
            </div>
    <?php } ?>
    <?php
        $sql = "SELECT * FROM productos";
        $resultado = $_conexion->query( $sql);
    ?>

    <h3 class="title">Listado de productos</h3>
    <br>
    <table class="table table-striped">
        <thead class="table-dark">
            <tr>
                <th>Nombre</th>
                <th>Precio</th>
                <th>Castegoría</th>
                <th>Stock</th>
                <th>Descripción</th>
                <th>Imagen</th>
            </tr>
        </thead>
        <tbody>
            <?php
                while( $fila = $resultado->fetch_assoc() ){
                    echo "<tr>";
                    echo "<td>". $fila["nombre"] ."</td>";
                    echo "<td>". $fila["precio"] ." €</td>";
                    echo "<td>". $fila["categoria"] ."</td>";
                    echo "<td>". $fila["stock"] ."</td>";
                    echo "<td>". $fila["descripcion"] ."</td>";
                    ?>
                    <td>
                        <img width="50" heigth="80" src="imagenes/<?php echo $fila["imagen"] ?>">
                    </td>
                    <?php
                    echo "</tr>";
                }
            ?>
        </tbody>
    </table>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>