<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>edades</title>
</head>
<body>
    <?php
    
    /* 
    CON IF Y CON MATCH:
    - Si la persona tiene entre 0 y 4 años, es un bebé.
    - Si la persona tiene entre 5 y 17 años, es menor de edad.
    - Si la persona tiene entrr 18 y 65 años, es adulto.
    - Si la persona tiene entre 66 y 120 años, es jubilado.
    Si la edad está fuera de rango, es error.
    */
    // Forma 1
    $edad = rand(-10,150);
    $rango;
    if ($edad<0 || $edad>120) {
        $rango = "no valido";
    } elseif ($edad<5) {
        $rango = "bebe";
    } elseif ($edad<18) {
        $rango = "menor-de-edad";
    } elseif ($edad<66) {
        $rango = "adulto";
    } else {
        $rango = "jubilado";
    }
    echo "<p>La persona tiene $edad y es $rango</p>";

    // Forma 2
    $resultado = match ($true) {
        $edad>=0 && $edad<5 =>  "<p>La persona tiene $edad y es $rango</p>",
        $edad>=5 && $edad<18 => "<p>La persona tiene $edad y es $rango</p>",
        $edad >= 18 && $edad<66 => "<p>La persona tiene $edad y es $rango</p>",
        $edad >66 && $edad<=120 => "<p>La persona tiene $edad y es $rango</p>",
        default => "<p>La persona tiene $edad y es $rango</p>",
    };
    echo $resultado;
    ?>
</body>
</html>