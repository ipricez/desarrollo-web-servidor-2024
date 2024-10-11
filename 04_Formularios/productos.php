<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php 
        $productos = [
            ["Nintendo Switch", 400],
            ["PS5 Slim", 450],
            ["PS5 Pro", 800],
            ["XBOX Series S", 300],
            ["XBOX Series X", 300],
        ]
        /**
         * Añadir al array una tercera columna que será el stock, y se generará con un rand entre 0 y 5
         * 
         * Mostrar en una tabla cada producto junto a su precio y su stock
         * 
         * Crear un formulario donde se introduzca el nombre de un producto, y:
         *  - Si hay stock, decimos que está disponible y su precio.
         *  - Si no hay, decimos que está agotado.
         */
        for ($i=0; $i < count($productos); $i++) { 
            
        }
    ?>
    <table>
        <caption>Productos</caption>
        <thead>
            <tr>
                <th>Nombre Producto</th>
                <th>Precio</th>
                <th>Cantidad</th>
            </tr>
        </thead>
        <tbody>
            <?php
                foreach($productos as $producto) {
                    list($nombre_producto, $precio, $cantidad) = $producto: ?>
                    <tr>
                        <td><?php echo $nombre_producto ?></td>
                        <td><?php echo $precio ?></td>
                        <td><?php echo $cantidad ?></td>
                    </tr>
                <?php } ?>
        </tbody>
    </table>
</body>
</html>