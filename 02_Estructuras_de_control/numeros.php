<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Index</title>
</head>
<body>
    <?php
    /*
    $numero = 0;

    if ($numero > 0) {
        echo "<p>El número es positivo</p>";
    } elseif ($numero == 0){
        echo "<p>El número es cero </p>";
    }else {
        echo "<p>El número es no es positivo</p>";
    }

    if ($numero >0) echo "<p>El número es positivo</p>";
    elseif ($numero == 0) echo "<p>El número es cero </p>";
    else echo "<p>El número no es positivo</p>";
    
    if ($numero > 0):
        echo "<p>El número es positivo</p>";
    elseif ($numero == 0):
        echo "<p>El número es cero </p>";
    else:
        "<p>El número no es positivo</p>";
    endif;
    */

    $numero = 3;

    # Rangos: [-10,0),[0,10],(10,20]

    if($numero >= -10 && $numero < 0) {
        echo "<p>El número $numero está en el rango [-10,0) </p>";
    } elseif ($numero > 0 and $numero < 10) {
        echo "<p>El número $numero está en el rango [0,10] </p>";
    } elseif ($numero > 10 && $numero <= 20) {
        echo "<p>El número $numero está en el rango (10,20] </p>";
    } else {
        echo "<p>El número $numero está fuera del rango.</p>";
    }

    /*
    ESCRIBIR UN IF QUE DECIDA CUAL DE LOS NUMEROS ES MAYOR O SI SON IGUALES
    HACERLO DE DOS FORMAS DIFERENTES
    */
    $numA = 2;
    $numB = 0;

    if($numA > $numB) echo"<p>$numA es mayor que $numB</p>";
    elseif($numA < $numB) echo"<p>$numA es menor que $numB</p>";
    else echo"<p>$numA es igual que $numB</p>";

    if($numA > $numB) {
        echo "<p>$numA es mayor que $numB</p>";
    } elseif ($numA < $numB) {
        echo"<p>$numA es menor que $numB</p>";
    } else {
        echo"<p>$numA es igual que $numB</p>";
    }
    ?>
</body>
</html>