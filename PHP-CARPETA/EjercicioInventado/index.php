<?php

include_once "turno";
session_start();

if (isset($_POST['btnEnviar'])){

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
    <h1 id="idTitulo">Ingrese sus datos</h1>
  </header>

  <section>
    <form action="index.php" method="post">
        <span>Nombre</span><input name="nombre" type="text" required>
        <span>Apellido</span><input name="apellido" type="text" required>
        <span>DNI</span><input name="dni" type="number" required>
        <label>Servicios: </label>
        <select name="servicios[]">
            <option value="ortodoncia">Ortodoncia</option>
            <option value="implantes">Implantes</option>
            <option value="odontoPediatria">OdontoPediatria</option>
        </select> 
        <label>Posee obra Social?</label>
            <input type="radio" name="obraSocial" value="si">
            <input type="radio" name="obraSocial" value="no">

        <button type="submit" name="btnEnviar">Enviar</button>

    </form>
  </section>

  <footer>
    
  </footer>
</body>
</html>