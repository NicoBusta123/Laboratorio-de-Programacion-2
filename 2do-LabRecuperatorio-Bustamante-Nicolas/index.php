<?php
session_start();

if (isset($_POST['btnIngresar']) && ($_POST['usuario']=="admin@gmail.com" && $_POST['contrasenia']=="idAdmin3278")){
    $_SESSION['usuario'] = "admin@gmail.com";
    $_SESSION['contrasenia'] = "idAdmin3278";
    $_SESSION['cantidadGenerados'] = 0;

    header("Location: dashboard.php");
    exit;

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
    <h1 class="titulo">Inicio de sesion</h1>
  </header>
  <section>
    <article>
      <form method="post" action="index.php" class="form">
        <span>Usuario: </span>
        <input name="usuario">
        <br><br>
        <span>Contrasenia</span>
        <input name="contrasenia" type="password">
        <br><br>
        <button name="btnIngresar" type="submit">Ingresar</button>
      </form>
    </article>
  </section>
  <footer>
    
  </footer>
</body>
</html>