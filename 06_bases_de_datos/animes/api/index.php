<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
        $url = "http://localhost/Ejercicios/06_bases_de_datos/animes/api/api_estudios.php";
        $curl = curl_init();
        curl_setopt($curl, CURLOPT_URL, $url);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        $respuesta = curl_exec($curl);
        curl_close($curl);

        $estudios = json_decode($respuesta, true);

        print_r($estudios);
    ?>
    <table>
        <thead>
            <tr>
                <td>Nombre estudio</td>
                <td>Ciudad</td>
                <td>Año fundacion</td>
            </tr>
        </thead>
        <tbody>
            <?php
            foreach($estudios as $estudio){ ?>
                <tr>
                    <td> <?php echo $estudio["nombre_estudio"] ?> </td>
                    <td> <?php echo $estudio["ciudad"] ?> </td>
                    <td> <?php echo $estudio["anno_fundación"] ?> </td>
                </tr>
        </tbody>
    </table>
</body>
</html>