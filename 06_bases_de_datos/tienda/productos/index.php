<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Productos</title>
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
    
    <?php
        if($_SERVER["REQUEST_METHOD"]=="POST") {
            $id_producto = $_POST["id_producto"];
            $sql = "DELETE FROM productos WHERE id_producto = '$id_producto'";
            $resultado = $_conexion->query( $sql);
        }
        $sql = "SELECT * FROM productos";
        $resultado = $_conexion->query( $sql);
    ?>

    
    <br>
    <a class="btn btn-secondary" href="nuevo_producto.php">Nuevo producto</a>
    <a class="btn btn-secondary" href="../index.php">Volver a menú principal</a>
    <br><h3 class="title">Listado de productos</h3><br>
    <table class="table table-striped">
        <thead class="table-dark">
            <tr>
                <th>Nombre</th>
                <th>Precio</th>
                <th>Castegoría</th>
                <th>Stock</th>
                <th>Descripción</th>
                <th>Imagen</th>
                <th>Editar</th>
                <th>Borrar</th>
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
                        <img width="50" heigth="80" src="<?php echo $fila["imagen"] ?>">
                    <td>
                        <a class="btn btn-primary" href="editar_producto.php?id_producto=<?php
                            echo $fila["id_producto"] ?>">Editar</a>
                    </td>
                    <td>
                        <form action="" method="post">
                            <input type="hidden" name="id_producto" value="<?php
                                echo $fila["id_producto"] ?>">
                            <input class="btn btn-danger" type="submit" value="Borrar">
                        </form>
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