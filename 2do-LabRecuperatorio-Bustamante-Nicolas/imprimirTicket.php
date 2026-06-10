<?php

session_start();

if (!isset($_SESSION['usuario'])){
    header("Location: index.php");
}

if (isset($_POST['btnReimprimir'])){
     if (isset($_SESSION['tickets']) && !empty($_SESSION['tickets'])) {
        foreach ($_SESSION['tickets'] as $ticket) {

           if($ticket['documento'] == $_POST['documento']) {
            echo "<h3>Nombre: ".$ticket['nombre']."</h3>";
            echo "<h3>Apellido: ".$ticket['apellido']."</h3>";
            echo "<h3>Documento: ".$ticket['documento']."</h3>";
            echo "<h3>Factura: ".$ticket['factura']."</h3>";
            echo "<h3>Fecha de alta: ".$ticket['fechaAlta']."</h3>";
            echo "<h3>Vehiculo: ".$ticket['vehiculo']."</h3>";
            echo "<h3>Servicios: </h3>";
            foreach ($ticket['servicios'] as $servicio) {
                echo "<h3>".$servicio."</h3>";
            }
            echo "<h3>Pagos: </h3>";
            foreach ($ticket['pago'] as $pago) {
                echo "<h3>".$pago."</h3>";
            }
            echo "<h3>Total: ".$ticket['total']."</h3>";

           }
        }
    } else {
        echo "<p>No hay tickets generados aún.</p>";
            }
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
    <h1 class="titulo">Reimprimir ticket</h1>
  </header>
  <section>
    <article>
      <form method="post" name="formReimprimir" class="form">
        Documento : <input type="number" name="documento">
        <br>
        <button type="submit" name="btnReimprimir">Reimprimir</button>
        <a href='dashboard.php'>Volver al Formulario</a>
        
      </form>
    </article>
  </section>
  <footer>
    
  </footer>
</body>
</html>