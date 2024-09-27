<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicios 1</title>
</head>
<body>
    <?php 
    /**
     * EJERCICIO 1
     * 
     * Calcula la suma de todos los numeros pares del 0 al 20
     * 
     * EJERCICIO 2
     * 
     * (Hay que invesigar un poco)
     * 
     * Muestra por pantalla la fecha actual con el siguiente formato:
     * "Miércoles 25 de septiembre de 2024*
     */
        $suma = 0;
        for ($i=1; $i <= 20; $i++) { 
            // if($i%2 == 0) $suma += $i;
        }
        echo "$suma";

        $dia = date("l");
        $dia = match($dia) {
            "Monday" => $dia = "Lunes",
            "Tuesday" => $dia = "Martes",
            "Wednesday" => $dia = "Miércoles",
            "Thursday" => $dia = "Jueves",
            "Friday" => $dia = "Viernes",
            "Saturday" => $dia = "Sábado",
            "Sunday" => $dia = "Domingo"
        };
        echo "<h3>$dia</h3>";

        $mes = date("F");
        $mes = match($mes) {
            "January" => "Enero",
            "February" => "Febrero",
            "March" => "Marzo",
            "April" => "Abril",
            "May" => "Mayo",
            "June" => "Junio",
            "July" => "Julio",
            "August" => "Agosto",
            "September" => "Septiembre",
            "October" => "Octubre",
            "November" => "Noviembre",
            "December" => "Diciembre"
        };
        echo "<h3>$mes</h3>";

        $dia_n = date("j");
        $anno = date("Y");
        echo "<h3>$dia $dia_n de $mes de $anno</h3>";
    ?>
    <?php
    /** 
     * Hacer un bucle que compruebe si un número es primo
     * 
     * - Bucle desde 2 hasta N-1, si algun resto = 0, no es primo
     * */ 
    $contador = 0;
     
    for ($i=1; $i < 50 ; $i++) {   
        $esPrimo = true;
        for ($j=2; $j < $i; $j++) { 
            
            if ($i % $j == 0) {
                $esPrimo = false;
            }
            
        }
        if ($esPrimo) {
            echo "<h4>El numero $i es primo.</h4>";
            $contador++;
            break;
        }
        else echo "<h4>El numero $i no es primo.</h4>";
    }
    echo "$contador";   

    ?>
    <?php
    /**
     * Calcular el Fibonacci de los 10 primeros números primos
     */
    echo "<h2>Fibonacci</h2>";
    $contador = 0;
    $i = 1;
    // Anterior numero
    $numAnt = 0;
    while ($contador<=10) {
        $esPrimo = true;

        for ($j=2; $j < $i; $j++) { 
            
            if ($i % $j == 0) {
                $esPrimo = false;
                break;
            }
            
        }
    }
    ?>
</body>
</html>