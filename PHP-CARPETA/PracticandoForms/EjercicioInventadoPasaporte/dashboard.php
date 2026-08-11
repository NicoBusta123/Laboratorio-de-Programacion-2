<?php
include_once "pasaporte.php";
session_start();


if(!isset($_SESSION['usuario'])){
    header("Location: index.php"); //para verificar que tenga que estar con la sesion iniciada si quiere estar aca
}

if(isset($_POST['btnCrear'])){
  $nombre = $_POST['nombre'];
  $apellido = $_POST['apellido'];
  $dni = $_POST['dni'];
  $nacionalidad = $_POST['nacionalidad'];
  $metodoPago = $_POST['metodoPago'];

  $pasaporte = new Pasaporte($nombre,$apellido,$dni,$nacionalidad,$metodoPago);

  $_SESSION['pasaportesIngresados'][]= $pasaporte;

  header("Location: PagPrincipal.php");
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
  <title>Titulo</title>
  <link rel="stylesheet" href="style.css">
</head>
<body class="paginaDashboard">

  <header class="encabezado">
    <form method="post" action="pagPrincipal.php" class="formHeader">
        <button name="btnCerrarSesion" type="submit">Cerrar Sesion</button>
        <button name="btnDashboard" type="submit">Crear Pasaporte</button>
        <button name="btnHome" type="submit">Home</button>
    </form>
    
  </header>

  <main>
    <section>

      <form name="form" class="formDashboard" method="post" action="dashboard.php">
        <label>Ingrese su nombre:</label>
            <input name="nombre" type="text" required>
        <label>Ingrese su Apellido: </label>
            <input name="apellido" type="text" required>
        <label>Ingrese su DNI: </label>
            <input name="dni" type="number" required>
        <label>Elija su nacionalidad: </label>
            <select name="nacionalidad">
                <option value="argentino">Argentino</option>
                <option value="chileno">Chileno</option>
                <option value="uruguayo">Uruguayo</option>
            </select>
        <label>Metodo de pago: </label>
            <label>Efectivo<input type="checkbox" name="metodoPago[]" value="efectivo">
            </label>
            <label>Transferencia<input type="checkbox" name="metodoPago[]" value="transferencia">
            </label>
            <label>Debito<input type="checkbox" name="metodoPago[]" value="debito">
            </label>

        <button name="btnCrear" type="submit">Crear Pasaporte</button>
      </form>

    </section>
  </main>

  <footer>
    <p>Nicolas Bustamante</p>
  </footer>

</body>
</html>