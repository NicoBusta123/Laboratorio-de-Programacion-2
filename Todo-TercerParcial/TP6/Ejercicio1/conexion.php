<?php

$conexion = new mysqli("localhost","root","","ejpaises");

// Si hay un error de conexión, frenamos la ejecución
if ($conexion->connect_error) {
    die("Error de conexión: " . $conexion->connect_error);
}
?>