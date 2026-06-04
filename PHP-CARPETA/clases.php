<?php
/**
 * CHEAT SHEET: CLASES Y OBJETOS EN PHP (Programación Orientada a Objetos)
 * -------------------------------------------------------------------------
 * Concepto básico: Una CLASE es el plano/molde (ej: el plano de un Inmueble).
 * Un OBJETOS es la instancia real nacida de ese molde (ej: la casa en Av. Rivadavia).
 */

// =========================================================================
// 1. ESTRUCTURA BÁSICA DE UNA CLASE
// =========================================================================
class Inmueble {
    
    // ATRIBUTOS / PROPIEDADES (Las variables de la clase)
    // 'public' significa que se pueden leer/modificar desde fuera de la clase.
    public $tipo;
    public $domicilio;
    public $habitaciones;
    
    // EL CONSTRUCTOR (El método que se ejecuta AUTOMÁTICAMENTE al crear el objeto)
    // Se usa para darle los valores iniciales al objeto.
    public function __construct($tipo, $domicilio, $habitaciones) {
        // '$this' significa "este objeto actual". 
        // Asigna lo que viene por parámetro a las propiedades de arriba.
        $this->tipo = $tipo;
        $this->domicilio = $domicilio;
        $this->habitaciones = $habitaciones;
    }
    
    // MÉTODOS (Las funciones/acciones que puede hacer la clase)
    public function obtenerFicha() {
        return "Inmueble tipo: " . $this->tipo . " ubicado en " . $this->domicilio;
    }
}

// COMO USARLA (Instanciar un objeto)
// Se usa la palabra clave 'new' y se le pasan los datos que pide el __construct
$miCasa = new Inmueble("Casa", "San Martín 150", 3);

// Acceder a un atributo o método (Se usa la flecha -> NO el punto .)
// echo $miCasa->tipo; // Imprime: Casa
// echo $miCasa->obtenerFicha(); // Imprime: Inmueble tipo: Casa ubicado en San Martín 150


// =========================================================================
// 2. MODIFICADORES DE ACCESO (Encapsulamiento - ¡MUY IMPORTANTE EN EXÁMENES!)
// =========================================================================
class CuentaBancaria {
    public $titular;      // Acceso total: Desde cualquier lado.
    private $saldo;       // Acceso CERRADO: SOLO se puede modificar/leer DENTRO de esta clase.
    protected $historial; // Acceso SEMI-CERRADO: Solo esta clase y las clases que HEREDEN de ella.

    public function __construct($titular, $saldoInicial) {
        $this->titular = $titular;
        $this->saldo = $saldoInicial;
    }

    // Como el saldo es 'private', usamos métodos GETTER y SETTER para controlarlo de forma segura:
    
    // GETTER: Para leer el valor desde afuera de forma segura
    public function getSaldo() {
        return "$" . $this->saldo;
    }

    // SETTER: Para modificar el valor desde afuera aplicando reglas de validación
    public function depositar($monto) {
        if ($monto > 0) {
            $this->saldo += $monto;
        }
    }
}

$cuenta = new CuentaBancaria("Nicolas", 5000);
// $cuenta->saldo = -1000; // ❌ ERROR DE PHP: No puedes tocar un atributo private directamente.
$cuenta->depositar(1500);  //  FORMA CORRECTA: Modificación controlada por un método.
// echo $cuenta->getSaldo();   //  FORMA CORRECTA: Lectura controlada.


// =========================================================================
// 3. HERENCIA (Reutilizar código de otra clase)
// =========================================================================
// Imagina que un "InmuebleComercial" sigue siendo un Inmueble, pero tiene cosas extra.
// Usamos 'extends' para heredar todo lo de la clase Inmueble original.

class InmuebleComercial extends Inmueble {
    public $rubroPermitido;

    // Si queremos un constructor propio, debemos llamar también al de la clase padre
    public function __construct($tipo, $domicilio, $habitaciones, $rubro) {
        // parent::__construct llama al constructor del padre (Inmueble) para llenar esos datos
        parent::__construct($tipo, $domicilio, $habitaciones);
        $this->rubroPermitido = $rubro; // Atributo exclusivo de la clase hija
    }

    // POLIMORFISMO: Podemos REESCRIBIR un método del padre para adaptarlo a la hija
    public function obtenerFicha() {
        // Reutilizamos el texto del padre y le sumamos el rubro
        return parent::obtenerFicha() . " [Apto para: " . $this->rubroPermitido . "]";
    }
}

$local = new InmuebleComercial("Local", "Av. Rivadavia 500", 1, "Gastronomía");
// echo $local->obtenerFicha(); // Imprime la ficha adaptada del local comercial.


// =========================================================================
// 4. MÉTODOS Y PROPIEDADES ESTÁTICAS (Palabra clave 'static')
// =========================================================================
// Las cosas estáticas pertenecen a la CLASE en general, no a un objeto individual.
// No necesitas hacer 'new Clase()' para usarlas.

class CalculadoraInmobiliaria {
    public static $impuestoPorcentaje = 2.5;

    public static function calcularComision($precioVenta) {
        // En cosas estáticas NO se usa $this. Se usa 'self::'
        return $precioVenta * (self::$impuestoPorcentaje / 100);
    }
}

// Uso directo usando el operador de resolución de ámbito (Doble dos puntos ::)
$comision = CalculadoraInmobiliaria::calcularComision(100000); 
// echo $comision; // 2500


// =========================================================================
// 5. NUEVA SINTAXIS MÁS RÁPIDA (PHP 8.0 en adelante) - "Constructor Property Promotion"
// =========================================================================
// Si estás usando PHP moderno, puedes ahorrarte declarar los atributos arriba
// y asignarlos dentro del constructor. Haciendo esto, PHP hace todo por detrás:

class PersonaModerna {
    // Al poner 'public' o 'private' directamente en los parámetros del constructor,
    // PHP crea el atributo y lo asigna automáticamente. ¡El constructor va vacío!
    public function __construct(
        public string $nombre,
        public string $apellido,
        private int $edad
    ) {}
}