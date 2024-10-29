<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio 2</title>
    <?php
        error_reporting( E_ALL );
        ini_set( "display_errors", 1 );
    ?>
</head>
<body>
    <?php
        /* Array de barrios de Málaga */
        $barrios = [
            ["Centro", 2543],
            ["Huelin", 1109],
            ["Malaga Este", 890],
            ["Palma/Palmilla", 49]
        ];

        /* Formulario que tenga un campo de texto y un boton. Comprobaremos si el barrio existe
        y en caso de que sí, mostramos el nombre del barrio, el número de viviendas turisticas y:
        - Si no hay viviendas, diremos que no hay viviendas turísticas.
        - Si hay entre 1 y 50 vt, diremos que hay unas pocas vt.
        - Si hay entre 51 y 1000 vt, diremos que hay bastantes vt.
        - Si hay mas de 1000 vt, diremos que hay demasiadas vt.*/
    ?>
    <table border="1">
        <caption>Barrios de Málaga</caption>
        <thead>
            <tr>
                <th>Barrio</th>
                <th>Viviendas turísticas</th>
            </tr>
        </thead>
        <tbody>
            <?php
            foreach($barrios as $barrio) {
                list($nombreBarrio, $vt) = $barrio; ?>
                <tr>
                    <td><?php echo $nombreBarrio ?></td>
                    <td><?php echo $vt ?></td>
                </tr>
            <?php } ?>
        </tbody>
    </table>
    <p><i>vt = Viviendas turísticas</i></p>
    
    <br>
    <form action="" method="post">
        <label for="texto">Introduce nombre del barrio.</label>
        <input type="text" name="nBarrio" id="nBarrio">
        <input type="submit" value="Comprobar barrio">
    </form>
    <?php
    if($_SERVER["REQUEST_METHOD"] == "POST") {
        $nBarrio = strtolower($_POST["nBarrio"]);

        $i = 0;
        $fila_barrio = null;
        $encontrado = false;
        while($i < count($barrios) && !$encontrado) {
            if(strtolower($barrios[$i][0]) == $nBarrio) {
                $encontrado = true;
                $fila_barrio = $i;
            }
            $i++;
        }
        if($encontrado && $barrios[$fila_barrio][1] > 1000) {
            echo "<p>Hay demasiadas vt.</p>";
        } elseif($encontrado && $barrios[$fila_barrio][1] >50) {
            echo "<p>Hay bastantes vt.</p>";
        } elseif($encontrado && $barrios[$fila_barrio][1] >=1) {
            echo "<p>Hay pocas vt.</p>";
        }else {
            echo "<p>No hay vt</p>";
        }
    }
    ?>
</body>
</html>