<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Notas</title>
</head>
<body>
    <?php
    $notas = [
        ["Paco","Desarrollo Web Servidor"],
        ["Paco","Desarrollo Web Cliente"],
        ["Manu","Desarrollo Web Servidor"],
        ["Manu","Desarrollo Web Cliente"],
    ];
    /**
     * Ejercicio 1: Añadir al array 4 estudiantes con sus asignaturas
     * Ejercicio 2: Eliminar 1 estudiante y su asignatura a libre elección
     * Ejercicio 3: Añadir una tercera columna que será la nota, obtenida aleatoriamente entre 1 y 10
     * Ejercicio 4: Añadir una cuarta columna que indique APTO o NO APTO, dependiendo de si la nota es igual o superior a 5 o no.
     * Ejercicio 5: Ordenar alfabéticamente por los alumnos, y luego por nota. Si hay varias filas con el mismo nombre y la misma nota,
     *  ordenar por la asignatura alfabéticamente.
     * Ejercicio 6: Mostrarlo todo en una tabla.
     */

    # 1)
    array_push ($notas,["Juan Antonio","Pesca"]);
    array_push ($notas,["Angel","Submarinismo"]);
    array_push ($notas,["Mateo","Escalada"]);
    array_push ($notas,["Jose Antonio","Baile"]);

    # 2)
    unset($notas[2]);

    # 3)
    $notas = array_values($notas);
    for($i = 0; $i < count($notas); $i++) {
        $notas[$i][2] = rand(1,10);
    }

    # 4)
    for($i = 0; $i < count($notas); $i++) {
        $nota = $notas[$i][2];
        if ($nota < 5) $notas[$i][3] = "NO APTO";
        else $notas[$i][3] = "APTO";
    }

    # 5)
    $_estudiante = array_column($notas,0);
    $_asignatura = array_column($notas,1);
    $_nota = array_column ($notas,2);
    ?>
    <table border="1">
            <thead>
                <th>Estudiante</th>
                <th>Asignatura</th>
                <th>Nota</th>
                <th>Calificacion</th>
            </thead>
            <tbody>
                <?php
                foreach($notas as $nota) {;
                    echo "<tr>";
                    echo "<td>$nota[0]</td>";
                    echo "<td>$nota[1]</td>";
                    echo "<td>$nota[2]</td>";
                    echo "<td>$nota[3]</td>";
                    echo "<tr>";
                }
                ?>
            </tbody>
    </table>
    <br><br><br>
    <table border="1">
            <thead>
                <th>Estudiante</th>
                <th>Asignatura</th>
                <th>Nota</th>
                <th>Calificacion</th>
            </thead>
            <tbody>
                <?php
                foreach($notas as $nota) {
                    list($estudiante, $asignatura, $puntos, $calificacion) = $nota;
                    $estudiante = $nota[0];
                    $asignatura = $nota[1];
                    $puntos = $nota[2];
                    $califiacion = $nota[3];
                }
                ?>
            </tbody>
    </table>
</body>
</html>