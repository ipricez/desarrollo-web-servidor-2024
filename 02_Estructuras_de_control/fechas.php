<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fechas</title>
</head>
<body>
    <?php
    echo date("j");

    // $numero % 4
    $dia = date("j");
    if($dia%2 == 0) echo "<p>El día es par.</p>";
    else echo "<p>El día no es par</p>";
    ?>
</body>
</html>