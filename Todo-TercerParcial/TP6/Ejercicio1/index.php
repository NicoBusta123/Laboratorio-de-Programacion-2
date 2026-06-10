<?php include 'conexion.php'; ?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>LAB de Programación - TP6 Ejercicio 1</title>
    <style>
    </style>
</head>
<body>

    <div class="contenedor">
        <h2>Selección de Destino</h2>
        
        <div class="form-group">
            <label for="comboPais">País:</label>
            <select id="comboPais" onchange="cargarCiudadesAsincronico()">
                <option value="">-- Seleccione un País --</option>
                <?php
                $resultado = $conexion->query("SELECT id_pais, nombre_pais FROM paises");
                while ($fila = $resultado->fetch_object()) {
                    echo "<option value='" . $fila->id_pais . "'>" . $fila->nombre_pais . "</option>";
                }
    ?>
</select>
        </div>

        <div class="form-group">
            <label for="comboCiudad">Ciudades:</label>
            <select id="comboCiudad">
                <option value="">-- Seleccione un país primero --</option>
            </select>
        </div>
    </div>

    <script src="ajax.js"></script>
</body>
</html>