<?php
session_start();

if (!isset($_SESSION['usuario'])) {
    header("Location: index.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Reporte de Pasaportes</title>
  <link rel="stylesheet" href="style.css">
</head>
<body>

  <section>
    <h1 class="titulo">Reporte de Pasaportes Emitidos</h1>
    
    <?php
    // Mostramos la cantidad total de reportes arriba
    $cantidad = $_SESSION['cantidadGenerados'] ?? 0;
    echo "<div style='background: #e2e8f0; padding: 10px; border-radius: 6px; margin-bottom: 20px; text-align: center;'>";
    echo "<h3>Cantidad de reportes generados en esta sesión: " . $cantidad . "</h3>";
    echo "</div>";

    if (isset($_SESSION['pasaportes']) && !empty($_SESSION['pasaportes'])) {
        foreach ($_SESSION['pasaportes'] as $usuario) {
            // Envolvemos cada pasaporte en un contenedor para que el CSS lo ordene
            echo "<div class='tarjeta-pasaporte'>";
            echo "<h3>Nombre: <span style='font-weight: normal;'>" . $usuario['nombre'] . "</span></h3>";
            echo "<h3>Apellido: <span style='font-weight: normal;'>" . $usuario['apellido'] . "</span></h3>";
            echo "<h3>Documento: <span style='font-weight: normal;'>" . $usuario['documento'] . "</span></h3>";
            echo "<h3>Fecha de nacimiento: <span style='font-weight: normal;'>" . $usuario['fechaNacimiento'] . "</span></h3>";
            echo "<h3>Género: <span style='font-weight: normal;'>" . $usuario['genero'] . "</span></h3>";
            echo "<h3>País: <span style='font-weight: normal;'>" . $usuario['pais'] . "</span></h3>";
            echo "<h3>Renueva: <span style='font-weight: normal;'>" . $usuario['renueva'] . "</span></h3>";
            echo "<h3>Fecha alta: <span style='font-weight: normal;'>" . $usuario['fechaAlta'] . "</span></h3>";
            echo "<h3>Código Verificador: <span style='font-weight: #1e3a8a;'>" . $usuario['codigoVerificador'] . "</span></h3>";
            echo "</div>";
            echo "<hr>"; // Separador de cada persona
        }
    } else {
        echo "<p>No hay pasaportes generados aún.</p>";
    }

    echo "<br><a href='formularioPasaporte.php'>Volver al Formulario</a>";
    ?>
  </section>

</body>
</html>