<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejemplos</title>
    <link href = "estilos.css" rel="stylesheet" type="text/css">
    <?php
        error_reporting( E_ALL );
        ini_set( "display_errors", 1 );
    ?>
</head>
<body>
    <?php
    $frutas = array(
        "clave 1" => "Manzana",
        'clave 2' => 'Naranja',
        'clave 3' => "Cereza"
    );

    //echo $frutas["clave 4"];
    //echo "<br>";

    $numeros1= [1,2,3,4,5];
    $numeros2= ["1","2","3","4","5"];
    if ($numeros1 === $numeros2) {
        echo "<h3>Los arrays de numeros son iguales.</h3>";
    } else {
        echo "<h3>Los arrays de numeros NO son iguales.</h3>";
    }

    $frutas = [
        "Manzana",
        "Naranja",
        "Cereza",
    ];

    $frutas2 = [
        0 => "Melocoton",
        1 => "Fresa",
        2 => "Albaricoque"
    ];

    $frutas3 = [
        0 => "Melocoton",
        1 => "Fresa",
        2 => "Albaricoque"
    ];
    if($frutas == $frutas2) {
        echo "<h3>Los arrays son iguales</h3>";
    } else {
        echo "<h3>Los arrays no son iguales</h3>";
    }

    echo "<h3>Mis frutas con FOR</h3>";
    echo "<ol>";
    for($i = 0; $i < count($frutas); $i++) {    //  3N
        echo "<li>" . $frutas[$i] . "</li>";
    }
    echo "</ol>";

    echo "<h3>Mis frutas con WHILE</h3>";
    echo "<ol>";
    $i = 0;
    while($i < count($frutas)) {
        echo "<li>" . $frutas[$i] . "</li>";    //  3N
        $i++;
    }
    echo "</ol>";

    echo "<h3>Mis frutas con FOREACH</h3>";
    echo "<ol>";
    foreach($frutas as $fruta) {
        echo "<li>$fruta</li>";
    }
    echo "</ol>";

    echo "<h3>Mis frutas con FOREACH con claves</h3>";
    echo "<ol>";
    foreach($frutas as $clave => $fruta) {
        echo "<li>$clave, $fruta</li>";
    }
    echo "</ol>";

    array_push($frutas, "Mango", "Melocotón");
    $frutas[] = "Sandía";
    $frutas[7] = "Uva";
    $frutas[] = "Melón";

    //echo $frutas[1];
    $frutas = array_values($frutas);

    unset($frutas[1]);

    //print_r($frutas);

    /*
        CREAR UN ARRAY CON UNA LISTA DE PERSONAS DONDE LA CLAVE SEA
        EL DNI Y EL VALOR EL NOMBRE

        QUE HAYA MINIMO 3 PERSONAS

        MOSTRAR EL ARRAY COMPLETO CON PRINT_R Y A ALGUNA PERSONA INDIVIDUAL

        AÑADIR ELEMENTOS CON Y SIN CLAVE

        BORRAR ALGUN ELEMENTO

        PROBAR A RESETAR LAS CLAVES
    */

    $personas = [
        "11223344F" => "José Alonso",
        "22331133G" => "Enya García",
        "44332211R" => "Fulgencio Hermenegildo"
    ];

    // RECORRER CON UN FOREACH EL ARRAY DE PERSONAS
    echo "<h3>Personas con FOREACH</h3>";
    echo "<ol>";
    foreach($personas as $nombre) {
        echo "<li>$nombre</li>";
    }
    echo "</ol>";

    echo "<h3>Personas con FOREACH</h3>";
    echo "<ol>";
    foreach($personas as $pikachu => $nombre) {
        echo "<li>$pikachu</li>";
    }
    echo "</ol>";

    // ************************************

    $personas["99112233G"] = "Cristiano 'El bicho' Ronaldo";
    array_push($personas, "Messi 'La pulga'");

    unset($personas[0]);

    print_r($personas);

    //echo "<p>" . $personas["22331133G"] . "</p>";

    $tamano = count($personas);
    echo "<h3>$tamano</h3>";


    ?>
    <table border="1">
        <thead>
            <tr>
                <th>DNI</th>
                <th>Nombre</th>
        </thead>
        <tbody>
            <tr>
                <td>22112233</td>
                <td>Pepe Pérez</td>
            </tr>
            <tr>
                <td>11223344</td>
                <td>Maria Pérez</td>
            </tr>
        <tbody>
    </table>

    <br><br><br>
    <h1>Tabla buena</h1>
    <?php 
    $personas["00112211"] = "Paquito de la Torre";
    $personas["22110044"] = "Paco Fiestas";
     /*
        sort
        arsort = asociative reverse sort
        rsort = reverse sort
        asort = asociative sort
        krsort
     */
    ?>
    <table>
        <thead>
            <tr>
                <th>DNI</th>
                <th>Nombre</th>
        </thead>
        <tbody>
            <?php
                foreach($personas as $dni => $nombre) {
                    echo "<tr>";
                        echo "<td>$dni</td>";
                        echo "<td>$nombre</td>";
                    echo "</tr>";
                }
            ?>
        <tbody>
    </table>
    <table>
        <thead>
            <tr>
                <th>DNI</th>
                <th>Nombre</th>
            </tr>
        </thead>
        <tbody>
            <?php
            foreach($personas as $dni => $nombre) { ?>
                <tr>
                    <td><?php echo $dni ?></td>
                    <td><?php echo $nombre ?></td>
                </tr>
            <?php }
            ?>
        </tbody>
    </table>


    <!--
                Desarrollo Web Servidor => Alejandra
                Desarrollo Web Cliente => Jaime
                Diseño de Interfaces => Jose
                Despliegue de Aplicaciones Web => Alejandro
                Empresa e Iniciativa Emprendedora => Gloria
                Inglés => Virginia

                MOSTRAR EN UNA TABLA LAS ASIGNATURAS Y SUS RESPECTIVOS PROFESORES

                LUEGO:

                MOSTRAR UNA TABLA ADICIONAL ORDENADA POR LA ASIGNATURA EN ORDEN ALFABÉTICO
                MOSTRAR UNA TABLA ADICIONAL ORDENADA POR LOS PROFESORES EN ORDEN ALFABÉTICO INVERSO
    -->
                <br><br>
    <?php 
        $asignaturas = [
            "Desarrollo Web Servidor" => "Alejandra",
            "Desarrollo Web Cliente" => "Jaime",
            "Diseño de Interfaces" => "Jose",
            "Despliegue de Aplicaciones Web" => "Alejandro",
            "Empresa e Iniciativa Emprendedora" => "Gloria",
            "Inglés" => "Virginia"
        ];
    ?>
    <table>
        <thead>
            <tr>
                <th>Asignatura</th>
                <th>Profesor</th>
            </tr>
        </thead>
        <tbody>
            <?php
            foreach($asignaturas as $clase => $profe) { ?>
                <tr>
                    <td><?php echo $clase ?></td>
                    <td><?php echo $profe ?></td>
                </tr>
            <?php } ?>
        </tbody>
    </table>

    <!--
                Guillermo => 3
                Diana => 5
                Ángel => 8
                Ayoub => 7
                Mateo => 9
                Joaquín => 4
    -->
    <?php 
        $boletin = [
            "3" => "Guillermo",
            "5" => "Daiana",
            "8" => "Ángel",
            "7" => "Ayoub",
            "9" => "Mateo",
            "4" => "Joaquín"
        ];
    ?>
    <table>
        <thead>
            <tr>
                <th>Alumno</th>
                <th>Nota</th>
                <th>Promociona
            </tr>
        </thead>
        <tbody>
            <?php
            
            foreach($boletin as $nota => $alumno) { ?>
                <tr>
                    <td><?php echo $alumno ?></td>
                    <td><?php echo $nota ?></td>
                    <td>
                        <?php 
                            if ($nota>=5) echo "SI";
                            else echo "NO";
                        ?>
                    </td>
                </tr>
            <?php } ?>
        </tbody>
    </table>

</body>
</html>