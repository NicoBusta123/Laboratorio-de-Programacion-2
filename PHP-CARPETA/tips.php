<?php

/*
========================================================
            TIPS Y CONSEJOS IMPORTANTES PHP
========================================================

Archivo de apuntes rápidos para usar
como referencia mientras programas.

========================================================
            ESTRUCTURA DE PROYECTOS
========================================================
*/

/*
Ejemplo recomendado:

mi_proyecto/
│
├── index.php
├── login.php
├── logout.php
├── dashboard.php
│
├── includes/
│   ├── header.php
│   ├── footer.php
│   └── conexion.php
│
├── css/
├── js/
└── img/
*/

/*
========================================================
            CAMBIAR DE PÁGINA
========================================================
*/

/*
header() sirve para redireccionar.
*/

header("Location: login.php");
exit();

/*
--------------------------------------------------------
IMPORTANTE
--------------------------------------------------------

header() debe ejecutarse
ANTES de cualquier HTML o echo.
*/

/*
❌ MAL
*/

echo "Hola";

header("Location: otra.php");

/*
✅ BIEN
*/

header("Location: otra.php");
exit();

/*
========================================================
            SIEMPRE USAR exit()
========================================================
*/

/*
Evita que PHP siga ejecutando código.
*/

header("Location: index.php");
exit();

/*
========================================================
                SESIONES
========================================================
*/

/*
Las sesiones sirven para:
- login
- mantener usuario logueado
- guardar datos temporales
*/

/*
--------------------------------------------------------
session_start()
--------------------------------------------------------

SIEMPRE arriba de todo.
*/

session_start();

/*
❌ MAL
*/

echo "Hola";

session_start();

/*
========================================================
            GUARDAR DATOS EN SESIÓN
========================================================
*/

session_start();

$_SESSION['usuario'] = "Nicolas";
$_SESSION['rol'] = "admin";

/*
========================================================
            LEER DATOS DE SESIÓN
========================================================
*/

session_start();

echo $_SESSION['usuario'];

/*
========================================================
            VERIFICAR LOGIN
========================================================
*/

/*
MUY importante en páginas privadas.
*/

session_start();

if(!isset($_SESSION['usuario']))
{
    header("Location: login.php");
    exit();
}

/*
========================================================
            CERRAR SESIÓN
========================================================
*/

session_start();

$_SESSION = [];

session_destroy();

header("Location: login.php");
exit();

/*
========================================================
                isset()
========================================================
*/

/*
Evita MUCHOS errores.
*/

/*
❌ MAL
*/

echo $_POST['nombre'];

/*
✅ BIEN
*/

if(isset($_POST['nombre']))
{
    echo $_POST['nombre'];
}

/*
========================================================
                VALIDACIONES
========================================================
*/

/*
Nunca confiar en el usuario.
*/

if(
    isset($_POST['nombre']) &&
    !empty($_POST['nombre'])
)
{
    echo "Dato válido";
}
else
{
    echo "Complete el campo";
}

/*
========================================================
            htmlspecialchars()
========================================================
*/

/*
Evita inyección HTML.
*/

$texto = htmlspecialchars($_POST['comentario']);

echo $texto;

/*
========================================================
            DIFERENCIA GET Y POST
========================================================
*/

/*
GET
- visible en URL
- búsquedas
- filtros

POST
- login
- formularios
- datos sensibles
*/

/*
GET:
pagina.php?nombre=nico
*/

echo $_GET['nombre'];

/*
POST:
*/

echo $_POST['nombre'];

/*
========================================================
        SABER SI EL FORMULARIO SE ENVIÓ
========================================================
*/

if($_SERVER['REQUEST_METHOD'] == 'POST')
{
    echo "Formulario enviado";
}

/*
========================================================
                INCLUDE
========================================================
*/

/*
Reutilizar archivos.
*/

include 'header.php';

/*
========================================================
                REQUIRE
========================================================
*/

/*
Igual que include pero obligatorio.
*/

require 'conexion.php';

/*
--------------------------------------------------------
Diferencia
--------------------------------------------------------

include:
- si falla, continúa

require:
- si falla, rompe
*/

/*
========================================================
            CONEXIÓN MYSQL
========================================================
*/

$conn = new mysqli(
    "localhost",
    "root",
    "",
    "mi_base"
);

/*
========================================================
            VER ERRORES MYSQL
========================================================
*/

if($conn->connect_error)
{
    die("Error: " . $conn->connect_error);
}

/*
========================================================
        NO MEZCLAR MUCHO HTML Y PHP
========================================================
*/

/*
❌ MAL
*/

echo "<h1>".$nombre."</h1>";

/*
✅ MEJOR
*/

?>

<h1><?php echo $nombre; ?></h1>

<?php

/*
========================================================
            ARRAYS ASOCIATIVOS
========================================================
*/

/*
Muy usados para datos.
*/

$usuario = [
    "nombre" => "Nico",
    "edad" => 20
];

/*
========================================================
            DEBUGGING
========================================================
*/

/*
--------------------------------------------------------
print_r()
--------------------------------------------------------
*/

print_r($_POST);

/*
--------------------------------------------------------
var_dump()
--------------------------------------------------------
*/

var_dump($usuario);

/*
========================================================
            MOSTRAR ERRORES
========================================================
*/

/*
MUY útil mientras practicas.
*/

error_reporting(E_ALL);
ini_set('display_errors', 1);

/*
========================================================
            empty()
========================================================
*/

/*
OJO:
*/

empty(0); // TRUE

/*
========================================================
        COMPARACIÓN ESTRICTA
========================================================
*/

/*
==  compara valor
=== compara valor y tipo
*/

5 == "5";   // true
5 === "5";  // false

/*
========================================================
            FUNCIONES ÚTILES
========================================================
*/

/*
--------------------------------------------------------
trim()
--------------------------------------------------------
*/

$texto = trim($texto);

/*
--------------------------------------------------------
strlen()
--------------------------------------------------------
*/

strlen($texto);

/*
--------------------------------------------------------
explode()
--------------------------------------------------------
*/

$colores = explode(",", $texto);

/*
--------------------------------------------------------
implode()
--------------------------------------------------------
*/

implode(",", $array);

/*
--------------------------------------------------------
count()
--------------------------------------------------------
*/

count($array);

/*
--------------------------------------------------------
in_array()
--------------------------------------------------------
*/

if(in_array("rojo", $colores))
{
    echo "Existe";
}

/*
========================================================
            PASSWORDS
========================================================
*/

/*
❌ NUNCA guardar passwords normales
*/

/*
❌ MAL
*/

$password = "1234";

/*
✅ BIEN
*/

$hash = password_hash(
    $password,
    PASSWORD_DEFAULT
);

/*
Verificar password
*/

password_verify($password, $hash);

/*
========================================================
                COOKIES
========================================================
*/

/*
setcookie() también debe ir
antes de HTML.
*/

setcookie(
    "usuario",
    "nico",
    time() + 3600
);

/*
========================================================
        FORMULARIOS AUTOPROCESADOS
========================================================
*/

if($_SERVER['REQUEST_METHOD'] == 'POST')
{
    // procesar
}
else
{
    // mostrar formulario
}

/*
========================================================
            NOMBRAR ARCHIVOS
========================================================
*/

/*
Buenas prácticas:
*/

login.php
logout.php
dashboard.php

/*
========================================================
            NOMBRAR VARIABLES
========================================================
*/

/*
Usar nombres claros:
*/

$nombreUsuario;
$fechaNacimiento;
$cantidadProductos;

/*
========================================================
            ERROR MUY COMÚN
========================================================
*/

/*
Undefined index
*/

/*
Pasa por:
*/

$_POST['nombre'];

/*
Solución:
*/

isset($_POST['nombre']);

/*
========================================================
            CÓMO PIENSA PHP
========================================================
*/

/*
1. Usuario entra
2. PHP recibe request
3. PHP procesa
4. PHP consulta BD
5. PHP genera HTML
6. Navegador muestra resultado
*/

/*
========================================================
        CONSEJO PARA PRACTICAR
========================================================
*/

/*
Separar ejercicios:

01_variables.php
02_if.php
03_for.php
04_arrays.php
05_post.php
06_session.php
07_cookie.php
08_mysql.php
*/

/*
========================================================
            APRENDER DESPUÉS
========================================================
*/

/*
1. CRUD
2. Login
3. Sesiones
4. Upload imágenes
5. MySQL
6. PDO
7. MVC
8. APIs
*/

/*
========================================================
                RESUMEN FINAL
========================================================

header()              -> redireccionar
session_start()       -> iniciar sesión
isset()               -> verificar existencia
empty()               -> verificar vacío
htmlspecialchars()    -> seguridad HTML
include               -> incluir archivo
require               -> incluir obligatorio
print_r()             -> mostrar arrays
var_dump()            -> debug completo
password_hash()       -> encriptar password
password_verify()     -> verificar password

========================================================
*/

?>