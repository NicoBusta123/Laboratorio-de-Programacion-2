<?php
/**
 * CHEAT SHEET: COOKIES EN PHP (Guía Completa de Escenarios)
 * -------------------------------------------------------------------------
 * NOTA CRÍTICA: Las cookies deben enviarse ANTES de que el script muestre
 * cualquier contenido HTML o texto en pantalla, ya que viajan en las
 * cabeceras HTTP (Headers).
 */

// =========================================================================
// ESCENARIO 1: CREACIÓN BÁSICA (Por tiempo limitado vs Fin de sesión)
// =========================================================================

// Caso A: Cookie de sesión (Se borra automáticamente al cerrar el navegador)
setcookie("usuario_sesion", "Juan123"); 

// Caso B: Cookie con tiempo de expiración (Dura 1 hora en este ejemplo)
// time() es la hora actual en segundos. 3600 segundos = 1 hora.
setcookie("usuario_temporal", "Maria456", time() + 3600);

// Caso C: Cookie de larga duración (Dura 30 días)
// 86400 segundos = 1 día.
setcookie("usuario_recuerdame", "Carlos789", time() + (86400 * 30));


// =========================================================================
// ESCENARIO 2: LEER EL VALOR DE UNA COOKIE
// =========================================================================

// Siempre es buena práctica verificar si existe con 'isset' antes de usarla
if (isset($_COOKIE['usuario_temporal'])) {
    $miUsuario = $_COOKIE['usuario_temporal'];
    // echo "El usuario guardado es: " . $miUsuario;
} else {
    // echo "La cookie ha expirado o no existe.";
}


// =========================================================================
// ESCENARIO 3: BORRAR / ELIMINAR UNA COOKIE
// =========================================================================

// Para borrar una cookie, se vuelve a crear pero con una fecha que ya pasó.
// Le restamos tiempo al reloj actual (por ejemplo, una hora atrás: time() - 3600)
setcookie("usuario_temporal", "", time() - 3600);


// =========================================================================
// ESCENARIO 4: GUARDAR ARREGLOS (ARRAYS) EN UNA COOKIE
// =========================================================================
// Las cookies SOLO aceptan texto plano. No puedes meter un array directamente.
// Para lograrlo, usamos json_encode() para convertirlo en texto, y json_decode() para leerlo.

$carrito_compras = [
    "producto" => "Teclado Mecánico",
    "precio" => 4500,
    "cantidad" => 1
];

// GUARDAR: Convertimos el array a texto JSON
setcookie("carrito", json_encode($carrito_compras), time() + 3600);

// LEER: Convertimos el texto JSON de vuelta a un Array Asociativo de PHP
if (isset($_COOKIE['carrito'])) {
    $mi_carrito_array = json_decode($_COOKIE['carrito'], true); // El 'true' lo convierte en array
    // Uso: echo $mi_carrito_array['producto'];
}


// =========================================================================
// ESCENARIO 5: GUARDAR OBJETOS EN UNA COOKIE
// =========================================================================
// Al igual que los arrays, los objetos deben convertirse a texto. 
// Para objetos complejos se suele usar serialize() y unserialize().

class Usuario {
    public $nombre;
    public $rol;
    
    public function __construct($nombre, $rol) {
        $this->nombre = $nombre;
        $this->rol = $rol;
    }
}

$objeto_usuario = new Usuario("Ana", "Administrador");

// GUARDAR: Serializamos el objeto (lo transforma en una cadena especial de texto)
setcookie("objeto_usuario", serialize($objeto_usuario), time() + 3600);

// LEER: Deserializamos para recuperar el objeto PHP con sus propiedades
if (isset($_COOKIE['objeto_usuario'])) {
    $mi_objeto_recuperado = unserialize($_COOKIE['objeto_usuario']);
    // Uso: echo $mi_objeto_recuperado->nombre;
}


// =========================================================================
// ESCENARIO 6: COOKIES MULTIDIMENSIONALES (Sintaxis de corchetes)
// =========================================================================
// PHP permite simular un array de cookies usando corchetes en el nombre.
// Esto creará cookies separadas en el navegador, pero PHP las agrupará al leerlas.

setcookie("preferencias[color]", "oscuro", time() + 3600);
setcookie("preferencias[idioma]", "es", time() + 3600);

// LEER: PHP lo recibe directamente como un array dentro de $_COOKIE
if (isset($_COOKIE['preferencias'])) {
    $color = $_COOKIE['preferencias']['color'];   // "oscuro"
    $idioma = $_COOKIE['preferencias']['idioma']; // "es"
}


// =========================================================================
// ESCENARIO 7: PARÁMETROS AVANZADOS (Seguridad y Rutas)
// =========================================================================
// La función setcookie acepta más parámetros:
// setcookie(nombre, valor, expiracion, ruta, dominio, secure, httponly);

// Ejemplo de Cookie Segura:
setcookie(
    "token_seguro",           // Nombre
    "xyz123secrettoken",      // Valor
    time() + 3600,            // Expiración
    "/",                      // Ruta: Disponible en todo el sitio web
    "",                       // Dominio: Por defecto el actual
    false,                    // Secure: Si es true, solo se envía por HTTPS (Ponlo true en producción)
    true                      // HttpOnly: Si es true, JavaScript NO puede leer la cookie (Protege de ataques XSS)
);

?>