<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Rick and Morty</title>
    <?php
        error_reporting(E_ALL);
        ini_set("display_errors", 1);
    ?>
</head>
<body>
    <?php
    if (isset($_GET['numero']) && isset($_GET['genero']) && isset($_GET['especies'])) {
        $numero = ($_GET['numero']); 
        $genero = $_GET['genero'];
        $especies = $_GET['especies'];

        $url = "https://rickandmortyapi.com/api/character/?gender=" . $genero . "&species=" . $especies;

        $curl = curl_init();
        curl_setopt($curl, CURLOPT_URL, $url);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        $respuesta = curl_exec($curl);
        curl_close($curl);

        $datos = json_decode($respuesta, true);
        $personajes = $datos["results"];
    }
    ?>
    <h1>Buscar Personajes de Rick and Morty</h1>
    <form action="" method="GET">
        <label for="numero">Cantidad de personas:</label>
        <input type="number" id="numero" name="numero" required>
        <br><br>

        <label for="genero">Género:</label>
        <select id="genero" name="genero" required>
            <option value="female">Female</option>
            <option value="male">Male</option>
        </select>
        <br><br>

        <label for="especies">Especie:</label>
        <select id="especies" name="especies" required>
            <option value="human">Human</option>
            <option value="alien">Alien</option>
        </select>
        <br><br>

        <input type="submit" value="Buscar">
    </form>
    <!-- Tabla de resultados -->
    <br><br>
    <table border="1">
        <thead>
            <tr>
                <td>Nombre Personaje</td>
                <td>Género</td>
                <td>Especie</td>
                <td>Origen</td>
                <td>Imagen</td>
            </tr>
        </thead>
        <tbody>
            <?php
            if (isset($personajes) && is_array($personajes)) {
                $limite = min($numero, count($personajes));
                for ($i = 0; $i < $limite; $i++) {
                    $personaje = $personajes[$i];
                    echo "<tr>";
                    echo "<td>" . $personaje['name'] . "</td>";
                    echo "<td>" . $personaje['gender'] . "</td>";
                    echo "<td>" . $personaje['species'] . "</td>";
                    echo "<td>" . $personaje['origin']['name'] . "</td>";
                    echo "<td>
                        <img src='" . $personaje['image'] . "' alt='Imagen de " . $personaje['name'] . "' style='width: 100px;'>
                    </td>";
                    echo "</tr>";
                }
            }
            ?>
        </tbody>
    </table>
</body>
</html>