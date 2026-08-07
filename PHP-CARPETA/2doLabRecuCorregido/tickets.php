<?php
// 1. FUNDAMENTAL: Incluir la clase ANTES de iniciar la sesión
require_once "ticket.php";
session_start();

if (!isset($_SESSION['usuario'])) {
    header("Location: index.php");
    exit;
}

// 2. Inicializamos los contadores limpios desde cero
$totalMotos = 0;
$totalAutos = 0;
$totalCamionetas = 0;

$lavadoChasis = 0;
$lavadoMotor = 0;
$interior = 0;
$lavadoInteriorChasis = 0;
$encerado = 0;

$gananciaTotal = 0;
$cantidadGenerados = 0;

// 3. Recorremos los objetos de la sesión para sumar los datos
if (isset($_SESSION['tickets']) && is_array($_SESSION['tickets'])) {
    
    $cantidadGenerados = count($_SESSION['tickets']);
    
    foreach ($_SESSION['tickets'] as $ticket) {
        // Sumamos al total general
        $gananciaTotal += $ticket->getTotal();

        // Contamos los vehículos
        $vehiculo = $ticket->getVehiculo();
        if ($vehiculo == "moto") $totalMotos++;
        if ($vehiculo == "auto") $totalAutos++;
        if ($vehiculo == "camioneta") $totalCamionetas++;

        // Contamos los servicios
        $servicios = $ticket->getServicios();
        if (is_array($servicios)) {
            foreach ($servicios as $servicio) {
                if ($servicio == "lavadochasis") $lavadoChasis++;
                if ($servicio == "lavadomotor") $lavadoMotor++;
                if ($servicio == "interior") $interior++;
                if ($servicio == "lavadointeriorChasis") $lavadoInteriorChasis++;
                if ($servicio == "encerado") $encerado++;
            }
        }
    }
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
    
    <h3>Cantidad de reportes generados en esta sesión: <?php echo $cantidadGenerados; ?></h3>
    
    <h3>Resumen de vehiculos atendidos</h3>
    Total de motos: <?php echo $totalMotos; ?><br>
    Total de autos: <?php echo $totalAutos; ?><br>
    Total de camionetas : <?php echo $totalCamionetas; ?><br>
    <hr>
    
    <h3>Resumen de servicios realizados</h3>
    Total de lavado de chasis: <?php echo $lavadoChasis; ?><br>
    Total de lavado de motor: <?php echo $lavadoMotor; ?><br>
    Total de lavado de interior: <?php echo $interior; ?><br>
    Total de lavado de interior y chasis: <?php echo $lavadoInteriorChasis; ?><br>
    Total de lavado de encerado: <?php echo $encerado; ?><br>
    
    <br>
    <h3>Total de ganancias registradas: $<?php echo $gananciaTotal; ?></h3>
    
    <br><a href='dashboard.php'>Volver al Formulario</a>
  </section>

</body>
</html>