<?php
$conexion = new mysqli("localhost","root","","franquicia");

if ($conexion-> connect_error){
    die("Error al conectarse a la base de datos".$conexion->connect_error);
}


?>