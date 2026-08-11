<?php
session_start();

if(isset($_SESSION['usuario'])){
    header("dashboard.php");
}

if(isset($_POST['btnEnviar']) && $_POST['contrasenia']=="admin"){
    $usuario = $_POST['nombre'];
    $_SESSION['usuario'] = $usuario;
    header("Location: dashboard.php");
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
<body class="paginaInicioSesion">

  <header>
    <h1 id="tituloSesion">Inicio de Sesion</h1>
  </header>

  <main>
    <section class="seccionSesion">
        <form id="form" method="post" action="index.php" class="formSesion">
            <label>Ingrese su nombre de usuario</label>
                <input name="nombre" type="text">
            <label>Ingrese su contrasenia</label>
                <input name="contrasenia" type="text">
            <button name="btnEnviar">Enviar</button>
        </form>
    </section>
  </main>

  <footer>
    <p>Nicolas Bustamante</p>
  </footer>

</body>
</html>