<?php

function esCentroNumerico($numero){
$primeraParte = 0;
$segundaParte = 0;
$numAuxiliar = $numero + 1;

for ($i=1; $i <  $numero; $i++) { 
    $primeraParte += $i;
}

while ($segundaParte <= $primeraParte){
    $segundaParte += $numAuxiliar;
    $numAuxiliar += 1;
    
}

if($primeraParte === $segundaParte){
    return true;

}

}


?>

