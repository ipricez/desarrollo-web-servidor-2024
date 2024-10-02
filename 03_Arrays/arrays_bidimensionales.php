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
        
    
</body>
</html>