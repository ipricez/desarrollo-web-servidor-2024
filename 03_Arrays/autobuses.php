<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Autobuses</title>
    <link href = "estilos.css" rel="stylesheet" type="text/css">
    <?php
        error_reporting( E_ALL );
        ini_set( "display_errors", 1 );
    ?>
</head>
<body>
    <?php
    # Origen, Destino, Duración(min), Precio (€)
    $autobuses = [
        ["Málaga","Ronda",90,10],
        ["Churriana","Málaga",20,3],
        ["Málaga","Granada",120,15],
        ["Torremolinos","Málaga",30,3.5],
    ];

    /**
     * 1. Añadir dos líneas de autobús.
     * 2. Ordenar por duración de más duración a menos.
     * 3. Mostrar las líneas en una tabla.
     */


    array_push ($autobuses, ["Málaga","Vigo",720,100]);
    array_push ($autobuses, ["Cabo de Gata","Málaga",180,20]);

    $_origen = array_column($autobuses,0);
    $_duracion = array_column($autobuses,2);
    array_multisort($_origen, SORT_ASC, $_duracion, SORT_DESC, $autobuses);

    # ??
    unset($autobuses[1]);
    unset($autobuses[4]);
    ?>
    <table border="1">
            <thead>
                <th>Origen</th>
                <th>Salida</th>
                <th>Duración</th>
                <th>Precio</th>
            </thead>
            <tbody>
                <?php
                foreach($autobuses as $autobuh) {
                    list($origen, $destino, $duracion, $precio) = $autobuh;
                    echo "<tr>";
                    echo "<td>$origen</td>";
                    echo "<td>$destino</td>";
                    echo "<td>$duracion</td>";
                    echo "<td>$precio</td>";
                    echo "<tr>";
                }
                ?>
            </tbody>
    </table>
    
    <?php
    for($i = 0; $i < count($autobuses); $i++) {
        $autobuses[$i][4] = "X";
    }
    print_r($autobuses);
    ?>
</body>
</html>