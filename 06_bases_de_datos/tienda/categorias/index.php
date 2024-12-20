<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Categorías</title>
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
            $categoria = $_POST["categoria"];
            // Eliminamos primero los productos que tengan esta categoria
            $sql = "DELETE FROM productos WHERE categoria = '$categoria'";
            $resultado = $_conexion->query( $sql);
            // Eliminamos la categoría ya que no hay productos dentro
            $sql = "DELETE FROM categorias WHERE categoria = '$categoria'";
            $resultado = $_conexion->query( $sql);
        }

        $sql = "SELECT * FROM categorias";
        $resultado = $_conexion->query( $sql);
    ?>
    <br>
    <a class="btn btn-secondary" href="nueva_categoria.php">Nueva categoria</a>
    <a class="btn btn-secondary" href="../index.php">Volver a menú principal</a>
    <br><h3 class="title">Categorias</h3><br>
    <table class="table table-striped">
    <thead class="table-dark">
        <tr>
            <th>Categoría</th>
            <th>Descripción</th>
            <th>Editar</th>
            <th>Eliminar</th>
        </tr>
    </thead>
    <tbody>
        <?php
            while( $fila = $resultado->fetch_assoc() ){
                echo "<tr>";
                echo "<td class='align-middle'>". $fila["categoria"] ."</td>";
                echo "<td class='align-middle'>". $fila["descripcion"] ."</td>";
                ?>
                <td class="align-middle">
                    <a class="btn btn-primary" href="editar_categoria.php?categoria=<?php echo $fila["categoria"] ?>">Editar</a>
                </td>
                <td class="align-middle">
                    <form action="" method="post">
                        <input type="hidden" name="categoria" value="<?php echo $fila["categoria"] ?>">
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