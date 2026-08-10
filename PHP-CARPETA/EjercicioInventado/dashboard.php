<?php
include_once "turno.php";
session_start();

if(isset($_POST['btnBorrarTurnos'])){
    session_destroy();
}



?>


<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Turnos</title>
  <link rel="stylesheet" href="style.css">
</head>
<body>

  <header>
    <h1>Lista de los turnos!</h1>
  </header>

  <main>
    <section>

      <article>
        <?php
        if(isset($_SESSION['turnos'])){
            foreach ($_SESSION['turnos'] as $turno) {
                echo "<h3>Nombre: ".$turno->getNombre()."</h3>";
                echo "<h3>Apellido: ".$turno->getApellido()."</h3>";
                echo "<h3>Dni: ".$turno->getDni()."</h3>";
                echo "<h3>Servicio: ".$turno->getServicio()."</h3>";
                echo "<h3>Obra Social: ".$turno->getObraSocial()."</h3>";
                echo "<h3>Total del turno: $".$turno->getTotal()."</h3>";
                echo "<hr>";
            }

        }else{
            echo "<h3>Todavia no hay turnos ingresados!!</h3>";
        }
            

        ?>
      </article>

      <article>
        <?php
            if(isset($_SESSION['turnos'])){
            ?>
                <label>Quieres borrar los turnos ingresados?</label>
                <form action="dashboard.php" method="post">
                    <button type="submit" name="btnBorrarTurnos">Borrar Turnos ingresados</button>
                </form>
            <?php
            }

        ?>

      </article>

      <article>
        <a href="index.php">Volver al ingreso de turnos</a>
      </article>

    </section>
  </main>

  <footer>
    <p>Nicolas Bustamante</p>
  </footer>

</body>
</html>