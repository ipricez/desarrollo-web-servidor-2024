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
            if($i%2 == 0) $suma += $i;
        }
        echo "$suma";

        
    ?>
</body>
</html>