<?php
session_start();

if(isset($_POST['btnIngresar'])){
    $usuario = $_POST['usuario'];
    $_SESSION['usuario'] = $usuario;
    
    if(!isset($_COOKIE["cantidadVisitas".$usuario])){
        setcookie("cantidadVisitas".$usuario,0,time()+3600);
    }else{
        $cantidadVisitasUsuario = $_COOKIE['cantidadVisitas'.$usuario];
        $cantidadVisitasUsuario += 1;
        setcookie("cantidadVisitas".$usuario,$cantidadVisitasUsuario,time()+3600);
    }

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
<body>

  <header>
    <h1>Inicio Sesion</h1>
  </header>

  <main>
    <section>
      <form action="index.php" method="post">
        <label>Usuario: <input type="text" name="usuario"></label>
        <label>Contrasenia: <input type="password" name="contrasenia"></label>
        <button type="submit" name="btnIngresar">Ingresar</button>
      </form>   
    </section>
  </main>

  <footer>
    <p>Pie de página</p>
  </footer>

</body>
</html>