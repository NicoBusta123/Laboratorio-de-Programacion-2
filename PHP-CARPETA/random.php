<?php

/*
|--------------------------------------------------------------------------
| CHEAT SHEET RANDOMS EN PHP
|--------------------------------------------------------------------------
| Funciones principales:
| - rand()
| - mt_rand()   -> más recomendada
| - random_int() -> segura (criptográficamente)
|--------------------------------------------------------------------------
*/


echo "<h1>CHEAT SHEET RANDOMS PHP</h1>";



/*
|--------------------------------------------------------------------------
| 1) RANDOM SIMPLE ENTRE DOS NÚMEROS
|--------------------------------------------------------------------------
*/

echo "<h2>1) Número random entre 1 y 10</h2>";

$numero = rand(1, 10);

echo $numero;



/*
|--------------------------------------------------------------------------
| 2) RANDOM CON mt_rand() (RECOMENDADA)
|--------------------------------------------------------------------------
*/

echo "<h2>2) Número random con mt_rand()</h2>";

$numero2 = mt_rand(100, 200);

echo $numero2;



/*
|--------------------------------------------------------------------------
| 3) RANDOM SEGURO CON random_int()
|--------------------------------------------------------------------------
| Ideal para:
| - tokens
| - códigos
| - contraseñas
|--------------------------------------------------------------------------
*/

echo "<h2>3) Número random seguro</h2>";

$numeroSeguro = random_int(1, 9999);

echo $numeroSeguro;



/*
|--------------------------------------------------------------------------
| 4) ELEGIR UN NOMBRE RANDOM DE UN ARRAY
|--------------------------------------------------------------------------
*/

echo "<h2>4) Nombre random</h2>";

$nombres = [
    "Nicolas",
    "Juan",
    "Maria",
    "Pedro",
    "Lucia"
];

$indice = array_rand($nombres);

echo $nombres[$indice];



/*
|--------------------------------------------------------------------------
| 5) ELEGIR VARIOS NOMBRES RANDOM
|--------------------------------------------------------------------------
*/

echo "<h2>5) Dos nombres random</h2>";

$indices = array_rand($nombres, 2);

echo $nombres[$indices[0]] . "<br>";
echo $nombres[$indices[1]];



/*
|--------------------------------------------------------------------------
| 6) RANDOM TRUE / FALSE
|--------------------------------------------------------------------------
*/

echo "<h2>6) Boolean random</h2>";

$booleano = (bool) mt_rand(0, 1);

var_dump($booleano);



/*
|--------------------------------------------------------------------------
| 7) RANDOM ENTRE DECIMALES
|--------------------------------------------------------------------------
*/

echo "<h2>7) Decimal random</h2>";

$decimal = mt_rand(0, 1000) / 100;

echo $decimal;



/*
|--------------------------------------------------------------------------
| 8) LETRA RANDOM
|--------------------------------------------------------------------------
*/

echo "<h2>8) Letra random</h2>";

$letras = "abcdefghijklmnopqrstuvwxyz";

$indice = mt_rand(0, strlen($letras) - 1);

echo $letras[$indice];



/*
|--------------------------------------------------------------------------
| 9) STRING RANDOM
|--------------------------------------------------------------------------
*/

echo "<h2>9) String random</h2>";

$caracteres = "abcdefghijklmnopqrstuvwxyz0123456789";
$string = "";

for($i = 0; $i < 8; $i++) {

    $indice = mt_rand(0, strlen($caracteres) - 1);

    $string .= $caracteres[$indice];
}

echo $string;



/*
|--------------------------------------------------------------------------
| 10) TIRAR UN DADO
|--------------------------------------------------------------------------
*/

echo "<h2>10) Tirada de dado</h2>";

$dado = mt_rand(1, 6);

echo "Salió: " . $dado;



/*
|--------------------------------------------------------------------------
| 11) CARA O CRUZ
|--------------------------------------------------------------------------
*/

echo "<h2>11) Cara o cruz</h2>";

$moneda = mt_rand(0, 1);

if($moneda == 0) {
    echo "Cara";
}
else {
    echo "Cruz";
}



/*
|--------------------------------------------------------------------------
| 12) BARAJAR UN ARRAY
|--------------------------------------------------------------------------
*/

echo "<h2>12) Shuffle</h2>";

$cartas = ["A", "B", "C", "D", "E"];

shuffle($cartas);

print_r($cartas);



/*
|--------------------------------------------------------------------------
| 13) SACAR ELEMENTO RANDOM DE ARRAY
|--------------------------------------------------------------------------
*/

echo "<h2>13) Elemento random</h2>";

$frutas = ["Manzana", "Banana", "Kiwi", "Pera"];

echo $frutas[array_rand($frutas)];



/*
|--------------------------------------------------------------------------
| 14) GENERAR COLOR HEX RANDOM
|--------------------------------------------------------------------------
*/

echo "<h2>14) Color HEX random</h2>";

$color = sprintf("#%06X", mt_rand(0, 0xFFFFFF));

echo $color;



/*
|--------------------------------------------------------------------------
| 15) PASSWORD RANDOM SIMPLE
|--------------------------------------------------------------------------
*/

echo "<h2>15) Password random</h2>";

$chars = "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789";
$password = "";

for($i = 0; $i < 12; $i++) {

    $password .= $chars[mt_rand(0, strlen($chars) - 1)];
}

echo $password;



/*
|--------------------------------------------------------------------------
| 16) RANDOM CON PROBABILIDADES
|--------------------------------------------------------------------------
*/

echo "<h2>16) Random con probabilidades</h2>";

$random = mt_rand(1, 100);

if($random <= 70) {
    echo "Común";
}
elseif($random <= 95) {
    echo "Raro";
}
else {
    echo "Legendario";
}



/*
|--------------------------------------------------------------------------
| 17) RANDOM ENTRE FECHAS
|--------------------------------------------------------------------------
*/

echo "<h2>17) Fecha random</h2>";

$inicio = strtotime("2025-01-01");
$fin = strtotime("2025-12-31");

$timestampRandom = mt_rand($inicio, $fin);

echo date("d/m/Y", $timestampRandom);



/*
|--------------------------------------------------------------------------
| 18) RANDOM DE COLORES
|--------------------------------------------------------------------------
*/

echo "<h2>18) Color random de array</h2>";

$colores = ["Rojo", "Azul", "Verde", "Negro"];

echo $colores[array_rand($colores)];



/*
|--------------------------------------------------------------------------
| 19) RANDOM DE OBJETOS
|--------------------------------------------------------------------------
*/

echo "<h2>19) Objeto random</h2>";

$personas = [
    [
        "nombre" => "Nico",
        "edad" => 20
    ],
    [
        "nombre" => "Juan",
        "edad" => 30
    ],
    [
        "nombre" => "Ana",
        "edad" => 25
    ]
];

$indice = array_rand($personas);

echo $personas[$indice]["nombre"] . " - ";
echo $personas[$indice]["edad"];



/*
|--------------------------------------------------------------------------
| 20) RANDOM SIN REPETIR
|--------------------------------------------------------------------------
*/

echo "<h2>20) Random sin repetir</h2>";

$numeros = range(1, 10);

shuffle($numeros);

for($i = 0; $i < 5; $i++) {
    echo $numeros[$i] . "<br>";
}

?>