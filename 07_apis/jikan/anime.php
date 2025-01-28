<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Anime</title>
    <?php
        error_reporting(E_ALL);
        ini_set("display_errors", 1);
    ?>
</head>
<body>
    <?php
        # Verifico si el ID está presente en la URL
        if (isset($_GET["id"])) {
            $id = $_GET["id"];

            $url = "https://api.jikan.moe/v4/anime/" . $id;

            $curl = curl_init();
            curl_setopt($curl, CURLOPT_URL, $url);
            curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
            $respuesta = curl_exec($curl);
            curl_close($curl);

            $datos = json_decode($respuesta, true);

            # Verifico si la API devolvió datos válidos
            if (isset($datos["data"])) {
                $anime = $datos["data"];
            } else {
                echo "<p>Error: No se encontró el anime con el ID proporcionado.</p>";
                exit;
            }
        } else {
            echo "<p>Error: No se proporcionó un ID de anime.</p>";
            exit;
        }
    ?>
    <!-- Tabla con título, sinopsis, imagen, año y enlace al trailer -->
    <table border="1">
        <thead>
            <tr>
                <th>Título</th>
                <th>Sinopsis</th>
                <th>Imagen</th>
                <th>Año</th>
                <th>Tráiler</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td><?php echo $anime["title"]; ?></td>
                <td><?php echo $anime["synopsis"]; ?></td>
                <td>
                    <img src="<?php echo $anime["images"]["jpg"]["image_url"]; ?>" width="100">
                </td>
                <td><?php echo $anime["year"]; ?></td>
                <td>
                    <a href="<?php echo $anime["trailer"]["url"]; ?>" target="_blank">Ver Tráiler</a>
                </td>
            </tr>
        </tbody>
    </table>

    <!-- Lista de los géneros -->
    <h2>Géneros</h2>
    <ul>
        <?php foreach ($anime["genres"] as $genero): ?>
            <li><?php echo $genero["name"]; ?></li>
        <?php endforeach; ?>
    </ul>

     <!-- Lista de productoras -->
     <h2>Productoras</h2>
    <ul>
        <?php foreach ($anime["studios"] as $productora): ?>
            <li><?php echo $productora["name"]; ?></li>
        <?php endforeach; ?>
    </ul>

    <h2>Animes Relacionados</h2>
    <ul>
        
    </ul>
</body>
</html>