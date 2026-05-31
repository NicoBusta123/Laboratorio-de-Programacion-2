<?php
session_start();

if(!isset($_SESSION['usuario'])){
    header("Location: index.php");
    exit;
}

if(isset($_POST['btnVerificar'])){
    $codigo = $_POST['codigoVerificador'];
    $documento = $_POST['documento'];
    $fechaAlta = $_POST['fechaAlta'];
    foreach ($_SESSION['pasaportes'] as $pasaporte) {
        if(($codigo == $pasaporte['codigoVerificador']) && ($documento == $pasaporte['documento']) && ($fechaAlta == $pasaporte['fechaAlta'])){
            echo "El pasaporte existe!";
            echo "<a href='formularioPasaporte.php'> Volver</a>";
        }
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
    <h1 class="titulo">Verificar existencia de pasaporte</h1>
  </header>
  <section>
    <article>
      <form name="formVerificar" method="post" class="form">
        <span>Ingresar codigo de verificacion</span>
        <input type="number" name="codigoVerificador"><br><br>
        <span>Ingresar documento</span>
        <input type="number" name="documento"><br><br>
        <span>Ingresar fecha de alta</span>
        <input type="date" name="fechaAlta"><br><br>
        <button name="btnVerificar">Verificar</button>

      </form>
    </article>
  </section>
  <footer>
    
  </footer>
</body>
</html>
