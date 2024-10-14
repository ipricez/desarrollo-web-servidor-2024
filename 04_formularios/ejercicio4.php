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
    <p>Realiza un formulario que funcione a modo de conversor de temperatuas. Se introducirá en un campo de texto la temperatura, y luego tendremos un select para elegir las unidades de dicha temperatura, y otro select para elegir las unidades a las que queremos convertir la temperatura.</p>
    <p>Por ejemplo, podemos introducir "10", y selecciopnar "CELSIUS", y luego "FAHRENHEIT". Se convertirán los 10 CELSIUS a su equivalente en FAHRENHEIT.</p>
    <p>En los SELECT se podrá elegir entre: CELSIUS, KELVIN y FAHRENHEIT.</p>
    <!-- Formulario -->
    <form action="" method="post">
        <input type="number" name="temperatura">
        <br><br>
        <p>Formato de temperatura a tener:</p>
        <select name="formato1" id="formato1">
            <option value="celsius">Celsius</option>
            <option value="kelvin">Kelvin</option>
            <option value="fahrenheit">Fahrenheit</option>
        </select>
        <br><br>
        <p>Formato de temperatura a querer:</p>
        <select name="formato2" id="formato2">
            <option value="celsius">Celsius</option>
            <option value="kelvin">Kelvin</option>
            <option value="fahrenheit">Fahrenheit</option>
        </select>
        <br><br>
        <input type="submit" value="Calcular">
    </form>
    <!-- Código PHP -->
    <?php
        if($_SERVER["REQUEST_METHOD"] == "POST") {
            $temperatura = floatval($_POST["temperatura"]);
            $formato1 = strtolower($_POST["formato1"]);
            $formato2 = strtolower($_POST["formato2"]);

            $resultado = 0;

            if ($formato1 == "celsius") {
                if($formato2 == "kelvin") {
                    $resultado = $temperatura + 273.15;
                } elseif ($formato2 == "fahrenheit") {
                    $resultado = (($temperatura *9/5) +32);
                } else {
                    $resultado = $temperatura;
                }
            } elseif ($formato1 == "kelvin") {
                if($formato2 == "celsius") {
                    $resultado = $temperatura - 273.15;
                } elseif ($formato2 == "fahrenheit") {
                    $resultado = (($temperatura - 273.15)*9/5) +32;
                } else {
                    $resultado = $temperatura;
                }
            } else {
                if($formato2 == "celsius") {
                    $resultado = ($temperatura - 32)*5/9;
                } elseif ($formato2 == "kelvin") {
                    $resultado = ($temperatura - 32)*5/9+273.15;
                } else {
                    $resultado = $temperatura;
                }
            }
            echo "<p>El resultado es $resultado grados $formato2.</p>";
        }
    ?>
</body>
</html>