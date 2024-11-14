<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nuevo Anime</title>
</head>
<body>
    <?php
    // Variables para almacenar errores y valores
    $err_titulo = $err_nombre_estudio = $err_anno_estreno = $err_num_temporadas = "";
    $titulo = $nombre_estudio = $anno_estreno = $num_temporadas = "";

    // Array con nombres de estudios de anime
    $estudios = ["Toei Animation", "Studio Ghibli", "Madhouse", "Bones", "MAPPA"];

    // Procesar el formulario cuando se envía
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Validación del título
        $titulo = trim($_POST["titulo"]);
        if (empty($titulo)) {
            $err_titulo = "El título es obligatorio.";
        } elseif (strlen($titulo) > 80) {
            $err_titulo = "El título no puede tener más de 80 caracteres.";
        } else {
            echo "<h2>El nombre es: $titulo</h2>";
        }

        // Validación del nombre del estudio
        if (empty($_POST["nombre_estudio"])) {
            $err_nombre_estudio = "El estudio es obligatorio.";
        } else {
            $nombre_estudio = $_POST["nombre_estudio"];
        }

        // Validación del año de estreno
        if (!empty($_POST["anno_estreno"])) {
            $anno_estreno = $_POST["anno_estreno"];
            $current_year = date("Y");
            if (!preg_match("/^[0-9]{4}$/", $anno_estreno) || $anno_estreno < 1960 || $anno_estreno > ($current_year + 5)) {
                $err_anno_estreno = "El año debe ser numérico entre 1960 y " . ($current_year + 5) . ".";
            }
        }

        // Validación del número de temporadas
        if (empty($_POST["num_temporadas"])) {
            $err_num_temporadas = "El número de temporadas es obligatorio.";
        } else {
            $num_temporadas = $_POST["num_temporadas"];
            if (!ctype_digit($num_temporadas) || $num_temporadas < 1 || $num_temporadas > 99) {
                $err_num_temporadas = "El número de temporadas debe ser un valor entre 1 y 99.";
            }
        }
    }
    ?>

    <h2>Formulario de Nuevo Anime</h2>
    <form action="nuevo_anime.php" method="post">
        <!-- Campo Título -->
        <label for="titulo">Título:</label><br>
        <input type="text" id="titulo" name="titulo" value="<?php echo htmlspecialchars($titulo); ?>">
        <?php if ($err_titulo) echo "<span class='error'>$err_titulo</span>"; ?>
        <br><br>

        <!-- Campo Nombre del Estudio -->
        <label for="nombre_estudio">Estudio:</label><br>
        <select id="nombre_estudio" name="nombre_estudio">
            <option value="">Selecciona un estudio</option>
            <?php
            foreach ($estudios as $estudio) {
                echo "<option value='$estudio'" . ($nombre_estudio == $estudio ? " selected" : "") . ">$estudio</option>";
            }
            ?>
        </select>
        <?php if ($err_nombre_estudio) echo "<span class='error'>$err_nombre_estudio</span>"; ?>
        <br><br>

        <!-- Campo Año de Estreno -->
        <label for="anno_estreno">Año de Estreno (opcional):</label><br>
        <input type="text" id="anno_estreno" name="anno_estreno" value="<?php echo htmlspecialchars($anno_estreno); ?>">
        <?php if ($err_anno_estreno) echo "<span class='error'>$err_anno_estreno</span>"; ?>
        <br><br>

        <!-- Campo Número de Temporadas -->
        <label for="num_temporadas">Número de Temporadas:</label><br>
        <input type="text" id="num_temporadas" name="num_temporadas" value="<?php echo htmlspecialchars($num_temporadas); ?>">
        <?php if ($err_num_temporadas) echo "<span class='error'>$err_num_temporadas</span>"; ?>
        <br><br>

        <input type="submit" value="Registrar Anime">
    </form>
</body>
</html>
