<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Clases de la Semana</title>
</head>
<body>
    <?php
    $dia = date("l");
    echo "<h1>Hoy es $dia</h1>";
    /* 
    HACER UN SWITCH QUE MUESTRE POR PANTALLA SI HOY HAY CLASES DE WEB SERVIDOR
    */
    switch ($dia) {
        case "Tuesday":
        case "Wednesday":
        case "Friday":
            echo "<p>Hoy SI hay clases de Web Servidor";
            break;
        default:
            echo "<p>Hoy NO hay clases de Web Servidor";
            break;
    }
    ?>
</body>
</html>