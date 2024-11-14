<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nuevo Estudio</title>
</head>
<body>
    <?php
    // Variables para almacenar errores y valores
    $err_nombre_estudio = $err_ciudad = "";
    $nombre_estudio = $ciudad = "";

    // Procesar el formulario cuando se envía
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Validación del nombre del estudio
        $nombre_estudio = trim($_POST["nombre_estudio"]);
        if (empty($nombre_estudio)) {
            $err_nombre_estudio = "El nombre del estudio es obligatorio.";
        } elseif (!preg_match("/^[a-zA-Z0-9\s]+$/", $nombre_estudio)) {
            $err_nombre_estudio = "El nombre solo puede contener letras, números y espacios.";
        }

        // Validación de la ciudad
        $ciudad = trim($_POST["ciudad"]);
        if (empty($ciudad)) {
            $err_ciudad = "La ciudad es obligatoria.";
        } elseif (!preg_match("/^[a-zA-Z\s]+$/", $ciudad)) {
            $err_ciudad = "La ciudad solo puede contener letras y espacios.";
        }
    }
    ?>

    <h2>Formulario de Nuevo Estudio</h2>
    <form action="nuevo_estudio.php" method="post">
        <!-- Campo Nombre del Estudio -->
        <label for="nombre_estudio">Nombre del Estudio:</label><br>
        <input type="text" id="nombre_estudio" name="nombre_estudio" value="<?php echo htmlspecialchars($nombre_estudio); ?>">
        <?php if ($err_nombre_estudio) echo "<span class='error'>$err_nombre_estudio</span>"; ?>
        <br><br>

        <!-- Campo Ciudad -->
        <label for="ciudad">Ciudad:</label><br>
        <input type="text" id="ciudad" name="ciudad" value="<?php echo htmlspecialchars($ciudad); ?>">
        <?php if ($err_ciudad) echo "<span class='error'>$err_ciudad</span>"; ?>
        <br><br>

        <input type="submit" value="Registrar Estudio">
    </form>
</body>
</html>
