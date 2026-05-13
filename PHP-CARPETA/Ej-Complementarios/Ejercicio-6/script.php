<?php

session_start();



/*
|--------------------------------------------------------------------------
| 1. SI VIENE DEL FORMULARIO → CREAR SESION
|--------------------------------------------------------------------------
*/

if(isset($_POST['usuario'])){

    $_SESSION['usuario'] = $_POST['usuario'];

}


/*
|--------------------------------------------------------------------------
| 2. SI NO HAY SESION → VOLVER AL LOGIN
|--------------------------------------------------------------------------
*/

if(!isset($_SESSION['usuario'])){

    header("Location: index.php");
    exit;

}


/*
|--------------------------------------------------------------------------
| 3. OBTENER NOMBRE DEL USUARIO
|--------------------------------------------------------------------------
*/

$nombre = $_SESSION['usuario'];


/*
|--------------------------------------------------------------------------
| 4. MOSTRAR ULTIMA VISITA SI EXISTE COOKIE
|--------------------------------------------------------------------------
*/

echo "<h1>Hola $nombre</h1>";

if(isset($_COOKIE['ultima_visita'])){

    echo "<p>Tu última visita fue el día: "
        . $_COOKIE['ultima_visita'] .
        "</p>";

}else{

    echo "<p>Es tu primera visita</p>";

}


/*
|--------------------------------------------------------------------------
| 5. ACTUALIZAR COOKIE DE ULTIMA VISITA
|--------------------------------------------------------------------------
*/

setcookie(
    "ultima_visita",
    date("d/m/Y H:i:s"),
    time() + 60*60*24*90
);


/*
|--------------------------------------------------------------------------
| 6. RECORDAR USUARIO Y CONTRASEÑA
|--------------------------------------------------------------------------
*/

if(isset($_POST['recordarContrasenia'])){

    setcookie(
        "usuario",
        $_POST['usuario'],
        time() + 60*60*24*90
    );

    setcookie(
        "contrasenia",
        $_POST['contrasenia'],
        time() + 60*60*24*90
    );

}


/*
|--------------------------------------------------------------------------
| 7. LINK PARA CERRAR SESION
|--------------------------------------------------------------------------
*/

echo "<br><br>";

echo "<a href='logout.php'>Cerrar Sesión</a>";

?>