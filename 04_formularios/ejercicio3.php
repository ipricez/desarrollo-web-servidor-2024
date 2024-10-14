<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio 2</title>
    <?php
        //  Activamos los errores de PHP
        error_reporting( E_ALL );
        ini_set( "display_errors", 1 );
    ?>
</head>
<body>
    <h2>Ejercicio 3</h2>
    <p>Realiza un formulario que reciba dos números y devuelva todos los números primos dentro de ese rango (incluidos los extremos).</p>
    <!-- Formulario -->
    <form action="" method="post">
        <input type="number" name="numeroA">
        <br><br>
        <input type="number" name="numeroB">
        <br><br>
        <input type="submit" value="multiplos">
    </form>
    <!-- Código PHP -->
    <?php
        if($_SERVER["REQUEST_METHOD"] == "POST") {
            $numeroA = $_POST["numeroA"];
            $numeroB = $_POST["numeroB"];
            
            if ($numeroA > $numeroB) {
                echo "<p>El numeroA debe ser menor que B</p>";
            } else {
                for ($i=$numeroA; $i<=$numeroB; $i++) { 
                    $primo = true;
                    # $j=1, 100% es divisible. Entonces empiezo en 2.
                    for ($j=2; $j < $i; $j++) { 
                        # Si el numero es divisible, entra en esta condición y ya no es primo.
                        if ($i%$j == 0) {
                            $primo = false;
                            $j = $i;
                        }
                    }
                    if ($primo) echo "<p>El número $i es primo.</p>";
                }
                
            }
        }
    ?>
</body>
</html>