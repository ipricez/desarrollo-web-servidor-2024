<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Arrays Bidimensionales</title>
</head>
<body>
    <?php
        $videojuegos = [
            ["Fifa 24", "Deporte", 70],
            ["Dark Souls", "Soulslike", 50],
            ["Hollow Knight", "Plataformas", 30]
        ];

        $nuevo_videojuego = ["Throne and Liberty", "MMO", 0];
        array_push ($videojuegos, $nuevo_videojuego);

        $titulo = array_column($videojuegos, 0);
        array_multisort($_titulo, SORT_ASC, $videojuegos);
        # SORT_ASC para orden ascendente
        # SORT_DESC para orden descendiente

        # Ej rapido 1: Ordenar por el precio de mas barato a mas caro
        $_precio = array_column($videojuegos,2);
        array_multisort($_precio, SORT_ASC, $videojuegos);
        # Ej rapido 2: Ordenar por la categoria en orden alfabetico inverso
        $_categoria = array_column($videojuegos,);
        array_multisort($_categoria, SORT_DESC, $videojuegos);
        ?>
        <table border="1">
            <thead>
                <th>Precio</th>
                <th>Categoria</th>
                <th>Precio</th>
            </thead>
            <tbody>
                <?php

                foreach($videojuegos as $videojuego) {
                    list($titulo, $categoria, $precio) = $videojuego;
                    echo "<tr>";
                    echo "<td>$titulo</td>";
                    echo "<td>$categoria</td>";
                    echo "<td>$precio</td>";
                    echo "<tr>";
                }
                ?>
            </tbody>
        </table>
    
</body>
</html>