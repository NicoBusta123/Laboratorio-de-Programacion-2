<?php
include_once "reserva.php";
session_start();

if(!isset($_SESSION['usuario'])){
    header("Location: index.php");
}

if(isset($_POST['btnRealizarReserva'])){
    $nombre = $_POST['nombre'];
    $apellido = $_POST['apellido'];
    $tipoCancha = $_POST['tipoCancha'];
    $horas = $_POST['horas'];
    $servicios = $_POST['servicios'];
    $socio = $_POST['socio'];

    $reserva = new Reserva($nombre,$apellido,$tipoCancha,$horas,$servicios,$socio);

    $_SESSION['reservas'][] = $reserva;
}

if(isset($_POST['btnMetricas'])){
    header("Location: metricas.php");
}

if(isset($_POST['btnHome'])){
    header("dashboard.php");
}

if(isset($_POST['btnCerrarSesion'])){
    session_destroy();
    header("Location: index.php");
}





?>



<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Dashboard</title>
  <link rel="stylesheet" href="style.css">
</head>
<body>

  <header class="encabezado">
    <form action="dashboard.php" method="post" class="formEncabezado">
        <button type="submit" name="btnHome">Home</button>
        <button type="submit" name="btnMetricas">Metricas</button>
        <button type="submit" name="btnCerrarSesion">Cerrar Sesion</button>
    </form>
  </header>

    <section>
        <h1 id="tituloReservar">Reservar Cancha!</h1>
    </section>

    <section class="seccionForm">
      <form action="dashboard.php" method="post" class="formDashboard">
        <label>Nombre: <input type="text" name="nombre" required></label>
        <label>Apellido: <input type="text" name="apellido" required></label>
        <label>Tipo de cancha 
            <select name="tipoCancha">
                <option value="f5">Futbol 5</option>
                <option value="padel">Padel</option>
                <option value="tenis">Tenis</option>
            </select>
        </label>
        <label>Cantidad de horas: </label>
        <select name="horas">
            <option value=1>1 hora</option>
            <option value=2>2 horas</option>
            <option value=3>3 horas</option>
        </select>
        <label>Servicios adicionales que desea:</label>
        <label>Iluminacion <input type="checkbox" name="servicios[]" value="iluminacion"></label>
        <label>Equipamiento<input type="checkbox" name="servicios[]" value="equipamiento"></label>
        <label>Vestuario<input type="checkbox" name="servicios[]" value="vestuario"></label>
        
        <label>Es socio del club?</label>
        <label>Si <input type="radio" name="socio" value="si"></label>
        <label>No <input type="radio" name="socio" value="no"></label>
        
        <button type="submit" name="btnRealizarReserva">Realizar Reserva</button>
      </form>
    </section>

  <footer>
    <p>Nicolas Bustamante</p>
  </footer>

</body>
</html>