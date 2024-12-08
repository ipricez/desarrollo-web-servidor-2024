<?php
    $_servidor = "localhost";
    $_usuario = "estudiante";
    $_contrasena = "estudiante";
    $_base_de_datos = "tienda_bd";

    // Tenemos dos opciones de librerías para crear una conexión con BBDD
    // Mysqli (más simple) ó PDO (más completa)
    $_conexion = new mysqli("$_servidor","$_usuario","$_contrasena","$_base_de_datos")
        or die("Error de conexión");
?>