<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio 3</title>
</head>
<body>
    <form action="" method="post">
        <label for="num">Introduce un número: </label>
        <input type="text" name="num" placeholder="número">
        <br><br>
        <label>Elige una de las opciones: </label>
        <select name="paroimpar">
            <option value="par">Par</option>
            <option value="primo">Primo</option>
        </select>
        <br><br>
        <input type="submit" value="Calcular">
    </form>
    <?php
        if($_SERVER["REQUEST_METHOD"] == "POST") {
            $numero = floatval($_POST["num"]);
            $opcion = strtolower($_POST["paroimpar"]);

            // Para ahorrar código, reservamos una variable que se pueda usar en
            // ambos casos y solo se escribirá una vez.
            $resultado = null;

            // Dependiendo del select, comprobamos si es primo o impar.
            if ($opcion == "par") {
                if (($numero%2)==0) echo "<p>El número $numero es par.</p>";
                else echo "<p>El número $numero no es par.</p>";
            } else {
                // Comprobamos si es primo
                $primo = true;
                // $i=1, 100% es divisible. Entonces empiezo en 2.
                for ($i=2; $j < $numero; $j++) {
                    // Si el numero es divisible, entra en esta condición
                    // y ya no es primo.
                    if (($numero%$i == 0)||($numero==1)) {
                            $primo = false;
                            $break;
                    }
                }
                if ($primo) echo "<p>El número $numero es primo.</p>";
                else echo "<p>El número $numero no es primo</p>";
            }
        }
    ?>
</body>
</html>