<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio 1</title>
    <?php
        error_reporting( E_ALL );
        ini_set( "display_errors", 1 );
    ?>
</head>
<body>
    <?php
        /* Creo el array asociativo */
        $personajesRol = [
            ["Paco", "Agua"],
            ["Guille", "Fuego"],
            ["JuanA", "Aire"],
            ["Estela", "Electricidad"]
        ];

        /* Añado dos nuevos personajes */
        array_push($personajesRol,["Angel","Tierra"]);
        array_push($personajesRol,["Luis","Bosque"]);

        /* Elimina el último personaje del array */
        $ultimo = count($personajesRol)-1;
        unset($personajesRol[$ultimo]);

        /* Añade una tercera columna al array, que se corresponderá
        con los puntos de ataque. Random entre 500 y 2.000 */
        for($i = 0; $i < count($personajesRol); $i++) {
            $personajesRol[$i][2] = rand(500,2000);
        }

        /* Añade una cuarta columna, que se corresponderá a los puntos
        de vida. Random entre 10.000 y 30.000 */
        for($i = 0; $i < count($personajesRol); $i++) {
            $personajesRol[$i][3] = rand(10000,30000);
        }

        /* Añade una quinta columna, que indicará el tipo de personaje
        en función de sus puntos de ataque y de vida.
        - Tanque: PS >= 20.000
        - Ataque: PA >= 1.500 y no es Tanque
        - Soporte: Cualquier otra cosa */
        for($i = 0; $i < count($personajesRol); $i++) {
            //$rol = $personajesRol[$i][4];
            if ($personajesRol[$i][3] >= 20000) $personajesRol[$i][4] = "Tanque";
            elseif ($personajesRol[$i][2] >= 1500) $personajesRol[$i][4] = "Ataque";
            else $personajesRol[$i][4] = "Soporte";
        }

        /* Ordena los personajes:
        1- PA
        2- PS
        3- Elemento
        4- Nombre */
        $_nombre = array_column($personajesRol,0);
        $_elemento = array_column($personajesRol,1);
        $_PA = array_column($personajesRol,2);
        $_PS = array_column($personajesRol,3);

        array_multisort($_PA, SORT_ASC,
                        $_PS, SORT_ASC,
                        $_elemento, SORT_ASC,
                        $_nombre, SORT_ASC,
                        $personajesRol);

        /* Muestra toda la informacion de los personajes en
        una tabla HTML5 */
    ?>
    <table border="1">
        <thead>
            <tr>
                <th>Nombre</th>
                <th>Elemento</th>
                <th>Ataque</th>
                <th>Salud</th>
                <th>Rol</th>
            </tr>
        </thead>
        <tbody>
            <?php
            foreach($personajesRol as $personajes) {
                list($nombre, $elemento, $pa, $ps, $tipo) = $personajes; ?>
                <tr>
                    <td><?php echo $nombre ?></td>
                    <td><?php echo $elemento ?></td>
                    <td><?php echo $pa ?></td>
                    <td><?php echo $ps ?></td>
                    <td><?php echo $tipo ?></td>
                </tr>
            <?php } ?>
        </tbody>
    </table>
</body>
</html>