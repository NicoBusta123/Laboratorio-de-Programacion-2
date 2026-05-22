<?php


$usuario = [
    "documento" => $_POST['documento'],
    "nombre" => $_POST['nombre'],
    "contrasenia" => $_POST['contrasenia']
];

$json = json_encode($usuario);



setcookie(
    $_POST['documento'],
    $json,
    time()+36000
    );


header("Location: inicio.php");
exit;


?>