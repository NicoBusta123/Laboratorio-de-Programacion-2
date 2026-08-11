<?php
include_once "pasaporte.php";
session_start();

if(!isset($_SESSION['usuario'])){
    header("Location: index.php");
}

if(isset($_POST['btnCerrarSesion'])){
    session_destroy();
    header("Location: index.php");
}

if(isset($_POST['btnDashboard'])){
    header("Location: dashboard.php");
}

if(isset($_POST['btnHome'])){
    header("Location: pagPrincipal.php");
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
<body>

  <header class="encabezado">
    <form method="post" action="pagPrincipal.php" class="formHeader">
        <button name="btnCerrarSesion" type="submit">Cerrar Sesion</button>
        <button name="btnDashboard" type="submit">Crear Pasaporte</button>
        <button name="btnHome" type="submit">Home</button>
    </form>
    
  </header>

  <main>
    <section>
        <h1 id="tituloPagPrincipal">En esta pagina podras crear pasaportes y ver los que haz creado!!</h1>
    </section>

    <section>
        <article>
            <?php
                if(isset($_SESSION['pasaportesIngresados'])){
                    foreach ($_SESSION['pasaportesIngresados'] as $pasaporte) {
                        $metodosPago = $pasaporte->getMetodoPago();
                        ?>
                        <div class="pasaporte">
                            <h3>Nombre: <?php echo $pasaporte->getNombre()?></h3>
                            <h3>Apellido: <?php echo $pasaporte->getApellido()?></h3>
                            <h3>DNI: <?php echo $pasaporte->getDni()?></h3>
                            <h3>Nacionalidad:<?php echo $pasaporte->getNacionalidad()?> </h3>
                            <h3>Metodos de pago:</h3>
                                <ul class="lista-pagos">
                                    <?php
                                    foreach ($metodosPago as $metodoPago) {
                                        echo "<li>".$metodoPago."</li>";
                                    }
                                    ?>
                                </ul>
                            <h3>Codigo de Verificacion: <?php echo $pasaporte->getCodigoVerificacion()?></h3>
                        </div>
                    <?php
                    }
            ?>
            <?php
                }else{
                    echo "<h2>Todavia no hay pasaportes ingresados!</h2>";
                }
            ?>
        </article>
    </section>
  </main>

  <footer>
    <p>Nicolas Bustamante</p>
  </footer>

</body>
</html>