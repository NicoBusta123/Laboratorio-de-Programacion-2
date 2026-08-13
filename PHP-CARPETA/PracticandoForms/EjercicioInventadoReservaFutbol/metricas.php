<?php
include_once "reserva.php";
session_start();

if(!isset($_SESSION['usuario'])){
    header("Location: index.php");
}

if(isset($_POST['btnHome'])){
    header("Location: dashboard.php");
}

if(isset($_POST['btnMetricas'])){
    header("Location: metricas.php");
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
  <title>Metricas</title>
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

  <main>
    <section class="seccionReservas">
        <?php
        if(!isset($_SESSION['reservas'])){
            echo "<h3>Todavia no se han hecho reservas este dia!!</h3>";
        }else{
            foreach ($_SESSION['reservas'] as $reserva) {
                ?>
                <div class="reserva">
                    <h3>Nombre: <?php echo $reserva->getNombre() ?></h3>
                    <h3>Apellido: <?php echo $reserva->getApellido() ?> </h3>
                    <h3>Tipo de cancha: <?php echo $reserva->getTipoCancha() ?></h3>
                    <h3>Horas: <?php echo $reserva->getHoras() ?></h3>
                    <h3>Servicios: </h3>
                        <ul>
                            <?php
                                foreach ($reserva->getServicios() as $servicio) {
                                   echo "<li>".$servicio."</li>";
                                }
                            ?>
                        </ul>
                    <h3>Es socio: <?php echo $reserva->getSocio() ?></h3>
                    <h3>Precio: <?php echo $reserva->getPrecio() ?></h3>
                    <h3>Fecha: <?php echo $reserva->getFecha() ?></h3>
                </div>
            <?php
            }
        }
        ?>
    </section>
  </main>

  <footer>
    <p>Nicolas Bustamante</p>
  </footer>

</body>
</html>