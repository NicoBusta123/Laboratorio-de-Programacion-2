<?php
function calcularCodigo($documento){
    
    $anioActual = date("Y");

    $cadena = $documento.$anioActual;

    $sumatoria = 0;

    for ($i=0; $i < strlen($cadena); $i++) { 
        $numero = $cadena[$i];
        $numeroMultiplicado = $numero * $i;
        $sumatoria = $sumatoria + $numeroMultiplicado;
    }

    return $sumatoria;

}

?>