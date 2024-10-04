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


    ?>
</body>
</html>