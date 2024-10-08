<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
    /**
     * SINGLE PAGE FORM -> TODA LA INFORMACION SE PROCESA EN LA MISMA PAGINA
     * 
     * MULTI PAGE FORM -> REENVIAN A OTRA PAGINA
     */
    ?>
    <form action="" method="post">
        <input type="text" name="mensaje">
        <input type="submit" value="Enviar">
    </form>
    <?php
        if ($_SERVER["REQUEST_METHOD"] == "POST")
        /**
         * 
         * 
         */
        $mensaje = $_POST["mensaje"];
        echo "<h1>$mensaje</h1>";
    ?>
</body>
</html>