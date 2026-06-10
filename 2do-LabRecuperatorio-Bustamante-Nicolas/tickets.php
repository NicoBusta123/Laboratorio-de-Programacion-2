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
  <title>Reporte de Tickets</title>
  <link rel="stylesheet" href="style.css">
</head>
<body>

  <section>
    <h1 class="titulo">Reporte de Tickets emitidos</h1>
    
    <?php
   
    $cantidad = $_SESSION['cantidadGenerados'] ?? 0;
    echo "<h3>Cantidad de reportes generados en esta sesión: " . $cantidad . "</h3>";
    echo "<h3>Resumen de vehiculos atendidos</h3>";


    if (!isset($_SESSION['cantidadmoto'])){
        $_SESSION['cantidadmoto'] = 0;

    }
    echo "Total de motos: ".$_SESSION['cantidadmoto'];

    if (!isset($_SESSION['cantidadcamioneta'])){
        $_SESSION['cantidadcamioneta'] = 0;

    }
    echo "Total de camionetas : ".$_SESSION['cantidadcamioneta'];

    if (!isset($_SESSION['cantidadauto'])){
        $_SESSION['cantidadauto'] = 0;

    }

    echo "Total de autos: ".$_SESSION['cantidadauto'];
    echo "<hr>";
    echo "<h3>Resumen de servicios realizados</h3>";
    if (!isset($_SESSION['cantidadServicioLavadoChasis'])){
        $_SESSION['cantidadServicioLavadoChasis'] = 0;
    }
    
    echo "Total de lavado de chasis: ".$_SESSION['cantidadServicioLavadoChasis']."<br>";

    if (!isset($_SESSION['cantidadServicioLavadoMotor'])){
        $_SESSION['cantidadServicioLavadoMotor'] = 0;

    }
    echo "Total de lavado de motor: ".$_SESSION['cantidadServicioLavadoMotor']."<br>";



    if (!isset($_SESSION['cantidadServicioInterior'])){
        $_SESSION['cantidadServicioInterior'] = 0;

    }
    echo "Total de lavado de interior: ".$_SESSION['cantidadServicioInterior']."<br>";

    if (!isset($_SESSION['cantidadServicioInteriorChasis'])){
        $_SESSION['cantidadServicioInteriorChasis'] = 0;

    }
    echo "Total de lavado de interior y chasis: ".$_SESSION['cantidadServicioInteriorChasis']."<br>";


    if (!isset($_SESSION['cantidadServicioEncerado'])){
        $_SESSION['cantidadServicioEncerado'] = 0;

    }
    echo "Total de lavado de encerado: ".$_SESSION['cantidadServicioEncerado']."<br>";
    
    $total = 0;

    foreach ($_SESSION['tickets'] as $ticket) {
        $total = $total + $ticket['total'];
    }

    echo "Total: ".$total;
    echo "<br><a href='dashboard.php'>Volver al Formulario</a>";
    ?>
  </section>

</body>
</html>