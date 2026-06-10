<?php
include_once "conexion.php";


header('Content-Type: application/json');

$nroDocumento = $_GET['nroDocumento'] ?? '';

// Usamos nombres claros: una cosa es el acumulador y otra el resultado de la BD
$listaOperaciones = []; 

if (!empty($nroDocumento)) { 
    
    $consulta = "SELECT tipoOperacion, FechaInicio, importe FROM operacion WHERE nroDocumento='$nroDocumento'";
    $resultadoBD = $conexion->query($consulta); 

    // Usamos [] para ir sumando cada fila al arreglo sin pisarlo
    while ($fila = $resultadoBD->fetch_object()) {
        $listaOperaciones[] = $fila; 
    }

    // 3. Evaluamos el arreglo acumulador
    if (count($listaOperaciones) > 0) {
        echo json_encode($listaOperaciones);
    } else {
        // CORREGIDO: Devolvemos un objeto JSON con el error para que JS lo entienda
        echo json_encode(["error" => "No se encontraron operaciones con ese DNI."]);
    }

} else {
    echo json_encode(["error" => "El documento no puede estar vacío."]);
}
?>