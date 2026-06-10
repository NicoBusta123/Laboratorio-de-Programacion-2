<?php
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
    if ($_POST['vehiculo'] == "moto"){
        $_SESSION['cantidadcamioneta']= ($_SESSION['cantidadcamioneta'] ?? 0) + 1;
    }

    $servicios = [];


    if(isset($_POST['servicioLavadoChasis'])){
        $servicios[] = $_POST['servicioLavadoChasis'] ;
        $_SESSION['cantidadServicioLavadoChasis'] = ($_SESSION['cantidadServicioLavadoChasis'] ?? 0) + 1;

    }
    if(isset($_POST['servicioLavadoMotor'])){
        $servicios[] = $_POST['servicioLavadoMotor'] ;
        $_SESSION['cantidadServicioLavadoMotor'] = ($_SESSION['cantidadServicioLavadoMotor'] ?? 0) + 1;

    }

    if(isset($_POST['servicioInterior'])){
        $servicios[] = $_POST['servicioInterior'] ;
        $_SESSION['cantidadServicioInterior'] = ($_SESSION['cantidadServicioInterior'] ?? 0) + 1;

    }

     if(isset($_POST['servicioInteriorChasis'])){
        $servicios[] = $_POST['servicioInteriorChasis'] ;
        $_SESSION['cantidadServicioInteriorChasis'] = ($_SESSION['cantidadServicioInteriorChasis'] ?? 0) + 1;

    }

    if(isset($_POST['servicioEncerado'])){
        $servicios[] = $_POST['servicioEncerado'] ;
        $_SESSION['cantidadServicioEncerado'] = ($_SESSION['cantidadServicioEncerado'] ?? 0) + 1;

    }

    $pagos = [];

    if(isset($_POST['pagoTransferencia'])){
        $pagos[] = $_POST['pagoTransferencia'] ;

    }

    if(isset($_POST['pagoEfectivo'])){
        $pagos[] = $_POST['pagoEfectivo'] ;

    }

    if(isset($_POST['pagoTarjeta'])){
        $pagos[] = $_POST['pagoTarjeta'] ;

    }
    
    function calcularTotalTicket($servicios){
        $totalTicket = 0;
        foreach ($servicios as $servicio) {
            if($servicio == "lavadochasis"){
                $totalTicket = $totalTicket + 20000;
            }
            if($servicio == "lavadomotor"){
                $totalTicket = $totalTicket + 5000;
            }
            if($servicio == "interior"){
                $totalTicket = $totalTicket + 5000;
            }
            if($servicio == "lavadoInteriorChasis"){
                $totalTicket = $totalTicket + 22000;
                
            }
            if($servicio == "encerado"){
                $totalTicket = $totalTicket + 5000;
                
            }


        }
        if ($_POST['vehiculo'] == "moto"){
            $descuento = 0;
            $descuento = $totalTicket * 0.20;
            $totalTicket = $totalTicket - $descuento;

        }

        if ($_POST['vehiculo'] == "camioneta"){
            $descuento = 0;
            $descuento = $totalTicket * 0.20;
            $totalTicket = $totalTicket + $descuento;

        }

        return $totalTicket;
    
}


    
    
    
    
    $ticket = [
        "nombre"=> $_POST['nombre'],
        "apellido"=> $_POST['apellido'],
        "documento"=> $_POST['documento'],
        "email"=> $_POST['email'],
        "factura"=> $_POST['factura'],
        "vehiculo"=> $_POST['vehiculo'],
        "servicios"=> $servicios,
        "pago"=> $pagos,
        "fechaAlta" => date("Y-m-d"),
        "total"=> calcularTotalTicket($servicios)
    ];

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
            <input name="servicioLavadoChasis" type="checkbox" value="lavadochasis">Lavado de Chasis
            <input name="servicioLavadoMotor" type="checkbox" value="lavadomotor">Lavado de motor
            <input name="servicioInterior" type="checkbox" value="interior">Lavado de interior
            <input name="servicioInteriorChasis" type="checkbox" value="lavadointeriorChasis">Lavado de interior y Chasis
            <input name="servicioEncerado" type="checkbox" value="encerado">Encerado

        

            
            
        <h3>Formas de pago</h3>
            <input name="pagoTransferencia" type="checkbox" value="transferencia">Transferencia
            <input name="pagoTarjeta" type="checkbox" value="tarjeta">Tarjeta
            <input name="pagoEfectivo" type="checkbox" value="efectivo">Efectivo
        
        <br><br>
        <button type="submit" name="btnGenerar">GenerarPasaporte</button>
        
    </form>
  </section>


  <footer>
    
  </footer>
</body>
</html>
