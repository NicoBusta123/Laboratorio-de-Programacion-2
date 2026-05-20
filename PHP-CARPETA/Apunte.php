<?php

/*
========================================================
                CHEAT SHEET PHP
========================================================

PHP = lenguaje de programación del lado del servidor.

- El código PHP se ejecuta en el servidor.
- El navegador recibe HTML generado por PHP.
- Los archivos usan extensión .php

--------------------------------------------------------
Estructura básica
--------------------------------------------------------
*/

<?php

echo "Hola Mundo";

/*
- <?php --> inicio código PHP
- ?>     --> fin código PHP
- ;      --> final de instrucción
*/

/*
--------------------------------------------------------
Comentarios
--------------------------------------------------------
*/

// Comentario de una línea

/*
Comentario
multilínea
*/

/*
========================================================
                VARIABLES
========================================================
*/

$nombre = "Nicolas";
$edad = 20;
$altura = 1.75;
$activo = true;

echo $nombre;

/*
========================================================
                CONCATENACIÓN
========================================================
*/

$nombre = "Nico";

echo "Hola " . $nombre;

/*
========================================================
                CONSTANTES
========================================================
*/

define("PI", 3.1416);

echo PI;

/*
========================================================
                HTML + PHP
========================================================
*/

?>

<!DOCTYPE html>
<html>
<head>
    <title>PHP</title>
</head>
<body>

<h1>
    <?php echo "Hola desde PHP"; ?>
</h1>

</body>
</html>

<?php

/*
========================================================
                ARREGLOS
========================================================
*/

/*
--------------------------------------------------------
Arreglo enumerado
--------------------------------------------------------
*/

$numeros = [10, 20, 30];

echo $numeros[0];

/*
--------------------------------------------------------
Arreglo asociativo
--------------------------------------------------------
*/

$persona = [
    "nombre" => "Nico",
    "edad" => 20
];

echo $persona["nombre"];

/*
--------------------------------------------------------
Arreglo multidimensional
--------------------------------------------------------
*/

$matriz = [
    [1,2],
    [3,4]
];

echo $matriz[1][0];

/*
========================================================
        ARREGLOS SUPERGLOBALES
========================================================
*/

/*
$_GET
$_POST
$_FILES
$_COOKIE
$_SESSION
$_SERVER
$GLOBALS
*/

/*
--------------------------------------------------------
$_SERVER
--------------------------------------------------------
*/

echo $_SERVER['SERVER_NAME'];
echo $_SERVER['REQUEST_METHOD'];

/*
========================================================
                FORMULARIOS
========================================================
*/

/*
--------------------------------------------------------
HTML -> PHP
--------------------------------------------------------
*/

?>

<form method="POST" action="procesar.php">

    Nombre:
    <input type="text" name="nombre">

    <input type="submit" value="Enviar">

</form>

<?php

/*
--------------------------------------------------------
procesar.php
--------------------------------------------------------
*/

$nombre = $_POST['nombre'];

echo "Hola " . $nombre;

/*
========================================================
                GET Y POST
========================================================
*/

/*
GET
- Los datos viajan en la URL
- Visible
- Menos seguro

POST
- Datos ocultos
- Más usado para formularios
*/

/*
Ejemplo GET:
pagina.php?nombre=Nico
*/

echo $_GET['nombre'];

/*
Ejemplo POST
*/

echo $_POST['nombre'];

/*
========================================================
            PÁGINA AUTOPROCESADA
========================================================
*/

/*
El mismo archivo:
- muestra formulario
- procesa datos
*/

if(isset($_POST['nombre']))
{
    echo "Hola " . $_POST['nombre'];
}
else
{
?>

<form method="POST">

    <input type="text" name="nombre">
    <input type="submit">

</form>

<?php
}

/*
========================================================
            VALIDACIÓN Y SEGURIDAD
========================================================
*/

/*
Nunca confiar en datos del usuario.
*/

/*
--------------------------------------------------------
htmlspecialchars()
--------------------------------------------------------

Evita ejecución de HTML.
Protege contra inyección HTML básica.
*/

$texto = htmlspecialchars($_POST['comentario']);

echo $texto;

/*
========================================================
                SESIONES
========================================================
*/

/*
Las variables normales se destruyen
cuando termina el script.

Las sesiones permiten mantener datos
entre distintas páginas.
*/

/*
--------------------------------------------------------
Iniciar sesión
--------------------------------------------------------
*/

session_start();

/*
IMPORTANTE:
session_start() debe ir al principio.
*/

/*
--------------------------------------------------------
Guardar datos en sesión
--------------------------------------------------------
*/

$_SESSION['usuario'] = "Nicolas";
$_SESSION['edad'] = 20;

/*
--------------------------------------------------------
Leer datos de sesión
--------------------------------------------------------
*/

echo $_SESSION['usuario'];

/*
--------------------------------------------------------
Verificar sesión
--------------------------------------------------------
*/

if(isset($_SESSION['usuario']))
{
    echo "Sesión iniciada";
}

/*
--------------------------------------------------------
Eliminar variable de sesión
--------------------------------------------------------
*/

unset($_SESSION['usuario']);

/*
--------------------------------------------------------
Destruir sesión completa
--------------------------------------------------------
*/

$_SESSION = [];

session_destroy();

/*
--------------------------------------------------------
ID de sesión
--------------------------------------------------------
*/

echo session_id();

/*
========================================================
                COOKIES
========================================================
*/

/*
Las cookies:
- se guardan en el navegador
- permiten almacenar datos
- persisten entre visitas
*/

/*
--------------------------------------------------------
Crear cookie
--------------------------------------------------------
*/

setcookie(
    "usuario",
    "Nicolas",
    time() + 3600
);

/*
Parámetros:
- nombre
- valor
- expiración
*/

/*
IMPORTANTE:
setcookie() debe ejecutarse
ANTES de imprimir HTML.
*/

/*
--------------------------------------------------------
Leer cookie
--------------------------------------------------------
*/

echo $_COOKIE['usuario'];

/*
--------------------------------------------------------
Verificar cookie
--------------------------------------------------------
*/

if(isset($_COOKIE['usuario']))
{
    echo "Existe cookie";
}

/*
--------------------------------------------------------
Modificar cookie
--------------------------------------------------------
*/

setcookie(
    "usuario",
    "NuevoNombre",
    time() + 3600
);

/*
--------------------------------------------------------
Eliminar cookie
--------------------------------------------------------
*/

setcookie(
    "usuario",
    "",
    time() - 3600
);

/*
========================================================
        DIFERENCIA COOKIE VS SESSION
========================================================
*/

/*
COOKIE
- se guarda en navegador
- puede persistir días/meses
- menos segura

SESSION
- se guarda en servidor
- termina al cerrar sesión
- más segura
*/

/*
========================================================
                JSON EN PHP
========================================================
*/

/*
JSON sirve para almacenar:
- objetos
- arreglos
- estructuras complejas
*/

/*
--------------------------------------------------------
json_encode()
--------------------------------------------------------
*/

$persona = [
    "nombre" => "Nico",
    "edad" => 20
];

$json = json_encode($persona);

echo $json;

/*
Resultado:
{"nombre":"Nico","edad":20}
*/

/*
--------------------------------------------------------
json_decode()
--------------------------------------------------------
*/

$datos = json_decode($json, true);

echo $datos['nombre'];

/*
========================================================
            GUARDAR JSON EN COOKIE
========================================================
*/

$usuario = [
    "nombre" => "Nico",
    "edad" => 20
];

$json = json_encode($usuario);

setcookie(
    "usuario",
    $json,
    time() + 3600
);

/*
Leer cookie JSON
*/

$datos = json_decode($_COOKIE['usuario'], true);

echo $datos['nombre'];

/*
========================================================
            XAMPP / WAMP
========================================================
*/

/*
XAMPP:
- guardar proyectos en:
C:/xampp/htdocs/

WAMP:
- guardar proyectos en:
C:/wamp/www/

--------------------------------------------------------
Ejecutar proyecto
--------------------------------------------------------

http://localhost/proyecto

Ejemplo:
http://localhost/mi_app
*/

/*
========================================================
                RESUMEN FINAL
========================================================

PHP:
- backend
- genera HTML dinámico

$_GET:
- datos por URL

$_POST:
- datos ocultos de formularios

$_SESSION:
- datos persistentes en servidor

$_COOKIE:
- datos guardados en navegador

json_encode():
- array/objeto -> JSON

json_decode():
- JSON -> array/objeto

htmlspecialchars():
- evita ejecución HTML

========================================================
*/

?>