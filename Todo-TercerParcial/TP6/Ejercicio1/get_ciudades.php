<?php
include 'conexion.php';

// Capturamos el id enviado por parámetro GET
$id_pais = $_GET['id_pais'] ?? '';

if (!empty($id_pais)) {
    // Usamos una consulta preparada para evitar inyecciones SQL
    $stmt = $conexion->prepare("SELECT id_ciudad, nombre_ciudad FROM ciudades WHERE id_pais = ?");
    $stmt->bind_param("i", $id_pais);
    $stmt->execute();
    $resultado = $stmt->get_result();

    $ciudades = [];
    while ($fila = $resultado->fetch_object()) {
        // Al ser un objeto, accedemos a las propiedades con "->"
        // en lugar de usar índices asociativos [""]
        $ciudad = new stdClass();
        $ciudad->id_ciudad = $fila->id_ciudad;
        $ciudad->nombre_ciudad = $fila->nombre_ciudad;
    
        $ciudades[] = $ciudad; 
}

header('Content-Type: application/json');
echo json_encode($ciudades);
} else {
    echo json_encode([]);
}
?>