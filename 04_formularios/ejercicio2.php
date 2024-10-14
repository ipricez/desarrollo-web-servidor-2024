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
    <h2>Ejercicio 2</h2>
    <p>Realiza un formulario que reciba 3 números: a,b y c. Se mostrarán en una lista los múltiplos de c que se encuentren entre a y b.</p>
    <!-- Formulario -->
    <form action="" method="post">
        <input type="number" name="numeroA">
        <br><br>
        <input type="number" name="numeroB">
        <br><br>
        <input type="number" name="numeroC">
        <br><br>
        <input type="submit" value="multiplos">
    </form>
    <!-- Código PHP -->
    <?php
        if($_SERVER["REQUEST_METHOD"] == "POST") {
            $numeroA = $_POST["numeroA"];
            $numeroB = $_POST["numeroB"];
            $numeroC = $_POST["numeroC"];
            
            if ($numeroA > $numeroB) {
                echo "<p>El numeroA debe ser menor que numeroB.</p>";
            } elseif ($numeroC == 0) {
                echo "<p>El numeroC no puede ser 0.</p>";
            } else {
                for($i=$numeroA; $i<=$numeroB; $i++) {
                    if (($i % $numeroC) == 0) {
                        echo "<p>$i</p>";
                    }
                }
            }
        };
    ?>
</body>
</html>