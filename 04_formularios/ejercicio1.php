<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio 1</title>
    <?php
        //  Activamos los errores de PHP
        error_reporting( E_ALL );
        ini_set( "display_errors", 1 );
    ?>
</head>
<body>
    <h2>Ejercicio 1</h2>
    <p>Realiza un formulario que reciba 3 números y devuelva el mayor de ellos.</p>
    <!-- Formulario -->
    <form action="" method="post">
        <input type="number" name="numeroA">
        <br><br>
        <input type="number" name="numeroB">
        <br><br>
        <input type="number" name="numeroC">
        <br><br>
        <input type="submit" value="Devolver">
    </form>
    <!-- Código PHP -->
    <?php
        if($_SERVER["REQUEST_METHOD"] == "POST") {
            $numeroA = $_POST["numeroA"];
            $numeroB = $_POST["numeroB"];
            $numeroC = $_POST["numeroC"];
            
            # Existe el método max();
            # $mayor = max($numeroA, $numeroB, $numeroC);

            $mayor = 0;
            if ($numeroA > $numeroB) {
                $mayor = $numeroA;
            } else {
                $mayor = $numeroB;
            }
            
            # Sabiendo ya el mayor y menor, queda compararlo con C.
            # Si C no es mayor, no toca el código.
            if ($numeroC > $mayor) {
                $mayor = $numeroC;
            }
            echo "<h2>El número más alto es: $mayor</h2>";
        };
    ?>
</body>
</html>