<?php

include_once "turno.php";
session_start();

if (isset($_POST['btnEnviar'])){
    $nombre = $_POST['nombre'];
    $apellido = $_POST['apellido'];
    $dni = $_POST['dni'];
    $servicio = $_POST['servicio'];
    $obraSocial = $_POST['obraSocial'];

    $turno = new Turno($nombre,$apellido,$dni,$servicio,$obraSocial);

    $_SESSION['turnos'][] = $turno;

}

if(isset($_POST['btnVerTurnos'])){
  header("Location: dashboard.php");
}


?>

<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>LPL - </title>
  <link rel="stylesheet" href="style.css">
</head>
<body>
  <header>
    <h1 class="titulo">Ingrese sus datos</h1>
  </header>

  <section class="seccionForm">
    <form action="index.php" method="post" class="form">
        <span>Nombre</span><input name="nombre" type="text" required>
        <span>Apellido</span><input name="apellido" type="text" required>
        <span>DNI</span><input name="dni" type="number" required>
        <label>Servicios: </label>
        <select name="servicio">
            <option value="ortodoncia">Ortodoncia</option>
            <option value="implantes">Implantes</option>
            <option value="odontoPediatria">OdontoPediatria</option>
        </select> 
        <label>Posee obra Social?</label>
            <input type="radio" name="obraSocial" value="si">
            <input type="radio" name="obraSocial" value="no">

        <button type="submit" name="btnEnviar">Enviar</button>

    </form>

    <label>Quieres ver los turnos ingresados?</label>
      <form name="form" action="index.php" method="post" class="form">
          <button type="submit" name="btnVerTurnos">Ver turnos</button>
      </form>
  </section>

  

  <footer>
    <p>Nicolas Bustamante</p>
  </footer>
</body>
</html>