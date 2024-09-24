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

    /*
    1. CREAR UN SWITCH QUE SEGÚN EL DIA EN QUE ESTEMOS, ALMACENE EN UNA VARIABLE EL DIA EN ESPAÑOL
    2. REESCRIBIR EL SWITCH DE LA ASIGNATURA CON LOS DIAS EN ESPAÑOL
    */
    switch ($dia) {
        case "Monday":
            $dia = "Lunes";
            break;
        case "Tuesday":
            $dia = "Martes";
            break;
        case "Wednesday":
            $dia = "Miercoles";
            break;
        case "Thursday":
            $dia = "Jueves";
            break;
        case "Friday":
            $dia = "Viernes";
            break;
        case "Saturday":
            $dia = "Sabado";
            break;
        case "Sunday":
            $dia = "Domingo";
            break;
    }
    echo "<p>Hoy es $dia</p>";
    switch ($dia) {
        case "Martes":
        case "Miercoles":
        case "Viernes":
            echo "<p>Hoy SI hay clases de Web Servidor";
            break;
        default:
            echo "<p>Hoy NO hay clases de Web Servidor";
            break;
    }

    // ESTRUCTURA MATCH PHP >= 8.0
    $resultado1 = match ($dia) {
        "Martes", "Miercoles", "Viernes" => "<p>Hoy $dia Si tenemos clases de Web Servidor.</p>",
        default => "<p>Hoy $dia No tenemos clases de Web Servidor.</p>",
    };

    echo $resultado1;
    ?>
</body>
</html>