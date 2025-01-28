<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Top Animes</title>
</head>
<body>
    <?php
        $url = "https://api.jikan.moe/v4/top/anime";

        $curl = curl_init();
        curl_setopt($curl, CURLOPT_URL, $url);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        $respuesta = curl_exec($curl);
        curl_close($curl);

        $datos = json_decode($respuesta, true);
        $animes = $datos["data"];
        #print:r($animes);
    ?>
    <!-- Radiobutton -->
    <form method="GET" action="">
        <label>
            <input type="radio" name="type" value="all" <?php echo ($type === "all") ? "checked" : ""; ?>> Todos
        </label>
        <label>
            <input type="radio" name="type" value="tv" <?php echo ($type === "tv") ? "checked" : ""; ?>> Series de TV
        </label>
        <label>
            <input type="radio" name="type" value="movie" <?php echo ($type === "movie") ? "checked" : ""; ?>> Película
        </label>
        <button type="submit">Filtrar</button>
    </form>

    <!-- Tabla con titulo, nota, imagen y enlace al anime-->
     <table>
        <thead>
            <tr>
                <td>Titulo</td>
                <td>Nota</td>
                <td>Imagen</td>
                <td>Enlace al anime</td>
            </tr>
        </thead>
        <tbody>
            <?php
            foreach($animes as $anime){ ?>
                <tr>
                    <td> <a href="<?php echo $anime["url"]?>"> <?php echo $anime["title"] ?> </a></td>
                    <td> <?php echo $anime["score"] ?> </td>
                    <td> <img src="<?php echo $anime["images"]["jpg"]["small_image_url"] ?> "></td>
                    <td> <a href="anime.php?id=<?php echo $anime["mal_id"] ?>"><?php echo $anime["url"]?></a> </td>
                </tr>
            <?php } ?>
        </tbody>
     </table>

    

</body>
</html>