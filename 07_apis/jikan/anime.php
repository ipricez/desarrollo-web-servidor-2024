<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Anime</title>
    <?php
        error_reporting( E_ALL );
        ini_set( "display_errors", 1 );
    ?>
</head>
<body>
    <?php
        # Recibo el ID
        $id = $_GET["id"];

        $url = "https://api.jikan.moe/v4/anime/" . $id;
        

        $curl = curl_init();
        curl_setopt($curl, CURLOPT_URL, $url);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        $respuesta = curl_exec($curl);
        curl_close($curl);

        $datos = json_decode($respuesta, true);
        $animes = $datos["data"];
        #print:r($animes);
    ?>
    <!-- Tabla con titulo, nota, imagen y enlace al anime-->
    <table border=1>0
        <thead>
            <tr>
                <td>Titulo</td>
                <td>Sinopsis</td>
                <td>Imagen</td>
                <td>Año</td>
                <td>Bonus Track: El trailer</td>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td><?php echo $animes["title"]?></td>
            </tr>
        </tbody>
     </table>
</body>
</html>