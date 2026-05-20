<?php

/*
========================================================
            CHEAT SHEET - ARREGLOS EN PHP
========================================================

TIPOS:
1) Arreglos enumerados
2) Arreglos asociativos
3) Arreglos multidimensionales

========================================================
            ARREGLO ENUMERADO
========================================================
*/

$numeros = [10, 20, 30, 40];

/*
Índices:
0 -> 10
1 -> 20
2 -> 30
3 -> 40
*/

echo $numeros[0]; // 10

/*
--------------------------------------------------------
Agregar elementos
--------------------------------------------------------
*/

$numeros[] = 50;

print_r($numeros);

/*
--------------------------------------------------------
Modificar elementos
--------------------------------------------------------
*/

$numeros[1] = 99;

print_r($numeros);

/*
--------------------------------------------------------
Cantidad de elementos
--------------------------------------------------------
*/

echo count($numeros);

/*
--------------------------------------------------------
Recorrer arreglo
--------------------------------------------------------
*/

for($i = 0; $i < count($numeros); $i++)
{
    echo $numeros[$i] . "<br>";
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
========================================================
            ARREGLO ASOCIATIVO
========================================================
*/

$persona = [
    "nombre" => "Nicolas",
    "edad" => 20,
    "pais" => "Argentina"
];

/*
Acceder a valores
*/

echo $persona["nombre"];
echo $persona["edad"];

/*
--------------------------------------------------------
Modificar valores
--------------------------------------------------------
*/

$persona["edad"] = 21;

/*
--------------------------------------------------------
Agregar valores
--------------------------------------------------------
*/

$persona["altura"] = 1.75;

print_r($persona);

/*
--------------------------------------------------------
Recorrer arreglo asociativo
--------------------------------------------------------
*/

foreach($persona as $clave => $valor)
{
    echo $clave . ": " . $valor . "<br>";
}

/*
========================================================
        ARREGLOS MULTIDIMENSIONALES
========================================================
*/

/*
Matriz 2x2
*/

$matriz = [
    [1, 2],
    [3, 4]
];

/*
Acceso:
*/

echo $matriz[0][0]; // 1
echo $matriz[1][1]; // 4

/*
--------------------------------------------------------
Recorrer matriz
--------------------------------------------------------
*/

for($i = 0; $i < count($matriz); $i++)
{
    for($j = 0; $j < count($matriz[$i]); $j++)
    {
        echo $matriz[$i][$j] . " ";
    }

    echo "<br>";
}

/*
========================================================
        ARRAY ASOCIATIVO MULTIDIMENSIONAL
========================================================
*/

$alumnos = [

    [
        "nombre" => "Nico",
        "edad" => 20
    ],

    [
        "nombre" => "Juan",
        "edad" => 22
    ]

];

echo $alumnos[0]["nombre"];
echo $alumnos[1]["edad"];

/*
========================================================
                FUNCIONES ÚTILES
========================================================
*/

/*
--------------------------------------------------------
count()
Cantidad de elementos
--------------------------------------------------------
*/

$numeros = [1,2,3];

echo count($numeros);

/*
--------------------------------------------------------
in_array()
Verifica si existe un valor
--------------------------------------------------------
*/

$frutas = ["Manzana", "Banana"];

if(in_array("Banana", $frutas))
{
    echo "Existe";
}

/*
--------------------------------------------------------
array_push()
Agregar al final
--------------------------------------------------------
*/

$numeros = [1,2];

array_push($numeros, 3);

print_r($numeros);

/*
--------------------------------------------------------
array_pop()
Eliminar último elemento
--------------------------------------------------------
*/

array_pop($numeros);

print_r($numeros);

/*
--------------------------------------------------------
sort()
Ordenar ascendente
--------------------------------------------------------
*/

$numeros = [5,2,9,1];

sort($numeros);

print_r($numeros);

/*
--------------------------------------------------------
rsort()
Ordenar descendente
--------------------------------------------------------
*/

rsort($numeros);

print_r($numeros);

/*
--------------------------------------------------------
array_keys()
Obtener claves
--------------------------------------------------------
*/

$persona = [
    "nombre" => "Nico",
    "edad" => 20
];

print_r(array_keys($persona));

/*
--------------------------------------------------------
array_values()
Obtener valores
--------------------------------------------------------
*/

print_r(array_values($persona));

/*
========================================================
            SUPERGLOBALES (ARREGLOS)
========================================================
*/

/*
PHP incluye arreglos especiales:
*/

$_GET;
$_POST;
$_SESSION;
$_COOKIE;
$_FILES;
$_SERVER;

/*
--------------------------------------------------------
Ejemplo $_POST
--------------------------------------------------------
*/

$nombre = $_POST['nombre'];

/*
========================================================
                isset()
========================================================

Verifica si existe una posición.
*/

if(isset($persona["nombre"]))
{
    echo "Existe";
}

/*
========================================================
                unset()
========================================================

Elimina un elemento.
*/

unset($persona["edad"]);

print_r($persona);

/*
========================================================
                print_r()
========================================================

Muestra el contenido del arreglo.
*/

print_r($persona);

/*
========================================================
                var_dump()
========================================================

Muestra:
- valor
- tipo
- longitud
*/

var_dump($persona);

/*
========================================================
                RESUMEN RÁPIDO
========================================================

[]                  -> crear arreglo
count()             -> cantidad
foreach             -> recorrer
print_r()           -> mostrar arreglo
isset()             -> verificar existencia
unset()             -> eliminar elemento
sort()              -> ordenar ascendente
rsort()             -> ordenar descendente
array_push()        -> agregar
array_pop()         -> eliminar último
in_array()          -> buscar valor

========================================================
*/

?>