<?php

/*
========================================================
    CHEAT SHEET - CONDICIONALES Y ESTRUCTURAS EN PHP
========================================================

Incluye:
- if
- else
- elseif
- switch
- operadores
- while
- do while
- for
- foreach
- break
- continue
- ternario
- match
- estructuras útiles

========================================================
                OPERADORES
========================================================
*/

/*
--------------------------------------------------------
Relacionales
--------------------------------------------------------
*/

$a = 10;
$b = 5;

$a == $b;   // igual
$a != $b;   // distinto
$a > $b;    // mayor
$a < $b;    // menor
$a >= $b;   // mayor o igual
$a <= $b;   // menor o igual

/*
--------------------------------------------------------
Lógicos
--------------------------------------------------------
*/

true && true;   // AND
true || false; // OR
!true;          // NOT

/*
========================================================
                    IF
========================================================
*/

$edad = 20;

if($edad >= 18)
{
    echo "Mayor de edad";
}

/*
========================================================
                IF - ELSE
========================================================
*/

$edad = 15;

if($edad >= 18)
{
    echo "Mayor";
}
else
{
    echo "Menor";
}

/*
========================================================
                ELSEIF
========================================================
*/

$nota = 8;

if($nota >= 9)
{
    echo "Excelente";
}
elseif($nota >= 6)
{
    echo "Aprobado";
}
else
{
    echo "Desaprobado";
}

/*
========================================================
            CONDICIONES COMPUESTAS
========================================================
*/

$edad = 20;
$tieneDni = true;

if($edad >= 18 && $tieneDni)
{
    echo "Puede ingresar";
}

/*
--------------------------------------------------------
OR
--------------------------------------------------------
*/

$admin = false;
$moderador = true;

if($admin || $moderador)
{
    echo "Tiene permisos";
}

/*
========================================================
                    SWITCH
========================================================
*/

$dia = 2;

switch($dia)
{
    case 1:
        echo "Lunes";
        break;

    case 2:
        echo "Martes";
        break;

    case 3:
        echo "Miércoles";
        break;

    default:
        echo "Otro día";
}

/*
IMPORTANTE:
break evita seguir ejecutando casos.
*/

/*
========================================================
                OPERADOR TERNARIO
========================================================
*/

$edad = 20;

$mensaje = ($edad >= 18)
    ? "Mayor"
    : "Menor";

echo $mensaje;

/*
========================================================
                MATCH (PHP 8+)
========================================================
*/

$dia = 1;

$resultado = match($dia)
{
    1 => "Lunes",
    2 => "Martes",
    3 => "Miércoles",
    default => "Otro"
};

echo $resultado;

/*
========================================================
                    WHILE
========================================================
*/

$i = 1;

while($i <= 5)
{
    echo $i . "<br>";

    $i++;
}

/*
========================================================
                DO WHILE
========================================================
*/

/*
Se ejecuta al menos una vez.
*/

$i = 1;

do
{
    echo $i . "<br>";

    $i++;

} while($i <= 5);

/*
========================================================
                    FOR
========================================================
*/

/*
for(inicio; condición; incremento)
*/

for($i = 0; $i < 5; $i++)
{
    echo $i . "<br>";
}

/*
========================================================
                FOREACH
========================================================
*/

$frutas = ["Manzana", "Banana", "Pera"];

foreach($frutas as $fruta)
{
    echo $fruta . "<br>";
}

/*
--------------------------------------------------------
Foreach asociativo
--------------------------------------------------------
*/

$persona = [
    "nombre" => "Nico",
    "edad" => 20
];

foreach($persona as $clave => $valor)
{
    echo $clave . ": " . $valor . "<br>";
}

/*
========================================================
                    BREAK
========================================================
*/

/*
Rompe el bucle.
*/

for($i = 1; $i <= 10; $i++)
{
    if($i == 5)
    {
        break;
    }

    echo $i;
}

/*
Resultado:
1234
*/

/*
========================================================
                CONTINUE
========================================================
*/

/*
Salta una iteración.
*/

for($i = 1; $i <= 5; $i++)
{
    if($i == 3)
    {
        continue;
    }

    echo $i;
}

/*
Resultado:
1245
*/

/*
========================================================
                NESTED LOOPS
========================================================
*/

/*
Bucles anidados
*/

for($i = 1; $i <= 3; $i++)
{
    for($j = 1; $j <= 3; $j++)
    {
        echo "$i - $j <br>";
    }
}

/*
========================================================
                isset()
========================================================
*/

/*
Verifica si existe variable.
*/

if(isset($_POST['nombre']))
{
    echo $_POST['nombre'];
}

/*
========================================================
                empty()
========================================================
*/

/*
Verifica si está vacía.
*/

$nombre = "";

if(empty($nombre))
{
    echo "Vacío";
}

/*
========================================================
                is_numeric()
========================================================
*/

/*
Verifica si es número.
*/

$valor = "123";

if(is_numeric($valor))
{
    echo "Es número";
}

/*
========================================================
                return
========================================================
*/

function sumar($a, $b)
{
    return $a + $b;
}

echo sumar(2,3);

/*
========================================================
            VALIDACIÓN TÍPICA FORMULARIOS
========================================================
*/

if(
    isset($_POST['nombre']) &&
    !empty($_POST['nombre'])
)
{
    echo "Nombre válido";
}
else
{
    echo "Complete el nombre";
}

/*
========================================================
            COMPARACIÓN ESTRICTA
========================================================
*/

/*
==  compara valor
=== compara valor y tipo
*/

$a = 5;
$b = "5";

var_dump($a == $b);   // true
var_dump($a === $b);  // false

/*
========================================================
            ESTRUCTURA GENERAL
========================================================
*/

if(condicion)
{
    // código
}
elseif(otra_condicion)
{
    // código
}
else
{
    // código
}

/*
========================================================
                RESUMEN RÁPIDO
========================================================

if                -> condición
else              -> alternativa
elseif            -> múltiples condiciones
switch            -> múltiples casos
match             -> switch moderno
while             -> bucle
do while          -> ejecuta al menos una vez
for               -> contador
foreach           -> recorrer arrays
break             -> cortar bucle
continue          -> saltar iteración
isset()           -> existe variable
empty()           -> vacío
is_numeric()      -> es número
===               -> comparación estricta

========================================================
*/

?>