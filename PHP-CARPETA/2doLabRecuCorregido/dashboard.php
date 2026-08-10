<?php
include_once "ticket.php";
session_start();



if (!isset($_SESSION['usuario'])){
    header("Location: index.php");
}

if (isset($_POST['btnSalir'])) {
    session_destroy();
    header("Location: index.php");
    exit;
}



if(isset($_POST['btnGenerar'])){
    if (!isset($_SESSION['tickets'])) {
        $_SESSION['tickets'] = [];
    }
    
    $_SESSION['cantidadGenerados'] = ($_SESSION['cantidadGenerados'] ?? 0) + 1;

    if ($_POST['vehiculo'] == "moto"){
        $_SESSION['cantidadmoto']=($_SESSION['cantidadmoto'] ?? 0) + 1;
    }
    if ($_POST['vehiculo'] == "auto"){
        $_SESSION['cantidadauto']= ($_SESSION['cantidadauto'] ?? 0) + 1;
    }
    if ($_POST['vehiculo'] == "camioneta"){
        $_SESSION['cantidadcamioneta']= ($_SESSION['cantidadcamioneta'] ?? 0) + 1;
    }

    $servicios = [];

    $servicios = $_POST['servicios'] ?? [];
    $pagos = $_POST['pagos'] ?? [];
    
        $nombre =$_POST['nombre'];
        $apellido =$_POST['apellido'];
        $documento = $_POST['documento'];
        $email = $_POST['email'];
        $factura = $_POST['factura'];
        $vehiculo = $_POST['vehiculo'];

    
    
    $ticket = new Ticket($nombre, $apellido, $documento, $vehiculo, $servicios, $pagos,$factura,$email);

    $_SESSION['tickets'][] = $ticket;
    echo "Ticket generado correctamente.";
}


if (isset($_POST['btnReportes'])){
    header("Location: tickets.php");
}

if(isset($_POST['btnReimprimir'])){
    header("Location: imprimirTicket.php");
}

?>


<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>2do Lab Recu 2026 Bustamante Nicolas </title>
  <link rel="stylesheet" href="style.css">
</head>
<body>
  <header>
    <form method="post" action="dashboard.php" class="form" name="formOpciones">
        <button name="btnReportes" type="submit">Reportes</button>
        <button name="btnReimprimir" type="submit">Reimprimir Ticket</button>
        <button name="btnSalir" type="submit">Salir</button>

    </form>
    

  </header>
  <section id="seccionForm" >
    <h1 class="titulo">Formulario de Pasaporte</h1>
    <form id="form" method="post" action="dashboard.php" class="form">
        <span>Ingrese su nombre <input id="nombre" type="text" required name="nombre"></span><br><br>
        <span>Ingrese su apellido <input id="apellido" type="text" required name="apellido"></span><br><br>
        <span>Numero de documento <input id="documento" type="number" required name="documento"></span><br><br>
        <span>Email <input id="documento" type="email" required name="email"></span><br><br> 
       
        <h3>Factura </h3>
            <span>A <input value="a" name="factura" type="radio" required></span>
            <span>B <input value="b" name="factura" type="radio" required></span>
        <br><br>

        <h3>Tipo de vehiculo </h3>
            <span>Auto <input value="auto" name="vehiculo" type="radio" required></span>
            <span>Camioneta <input value="vehiculo" name="vehiculo" type="radio" required></span>
            <span>Moto <input value="moto" name="vehiculo" type="radio" required></span>
        <br><br>

        <h3>Servicios ofrecidos</h3>
            <input name="servicios[]" type="checkbox" value="lavadochasis">Lavado de Chasis
            <input name="servicios[]" type="checkbox" value="lavadomotor">Lavado de motor
            <input name="servicios[]" type="checkbox" value="interior">Lavado de interior
            <input name="servicios[]" type="checkbox" value="lavadointeriorChasis">Lavado de interior y Chasis
            <input name="servicios[]" type="checkbox" value="encerado">Encerado

        

            
            
        <h3>Formas de pago</h3>
            <input name="pagos[]" type="checkbox" value="transferencia">Transferencia
            <input name="pagos[]" type="checkbox" value="tarjeta">Tarjeta
            <input name="pagos[]" type="checkbox" value="efectivo">Efectivo
    
        <br><br>
        <button type="submit" name="btnGenerar">GenerarPasaporte</button>
        
    </form>
  </section>


  <footer>
    
  </footer>
</body>
</html>
