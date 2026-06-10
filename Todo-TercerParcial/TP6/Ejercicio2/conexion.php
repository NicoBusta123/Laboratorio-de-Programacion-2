<?php
$conexion = new mysqli("localhost","root","","inmobiliaria");

if ($conexion -> connect_error){
    die("Error de conexion: ".$conexion -> connect_error);
}



?>