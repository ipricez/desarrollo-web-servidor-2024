<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Listas</title>
</head>
<body>
    <h3>Lista 1</h3>
    <?php
    $i = 1;
    echo "<ul>";
    while ($i < 10) {
        echo "<li>$i</li>";
        $i++;
    }
    echo "</ul>";
    
    ?>
    <h3>Lista 2</h3>
    <?php
    $i = 1;
    echo "<ul>";
    while ($i < 10):
        echo "<li>$i</li>";
        $i++;
    endwhile;
    echo "</ul>";    
    ?>
    <h3>Tabla 3</h3>
    <?php
    /*
    CON WHILE Y LAS ESTRUCTURAS DE CONTROL NECESARIAS, MUESTRA EN UNA LISTA SIN ORDENAR
    TODOS LOS MULTIPLOS DE 3 ENTRE 1 Y 3
    */
    ?>
</body>
</html>