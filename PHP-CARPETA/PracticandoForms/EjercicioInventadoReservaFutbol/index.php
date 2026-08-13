<?php
session_start();

if(isset($_SESSION['usuario'])){
    header("Location: dashboard.php");
}

if(isset($_POST['btnIngresar'])){

    $usuario = $_POST['usuario'];
    $_SESSION['usuario'] = $usuario;

    if(!isset($_COOKIE['cantidadVisitas'.$usuario])){
        setcookie("cantidadVisitas".$usuario,1,time()+3600);
    }else{
        $cantidadVisitas = $_COOKIE['cantidadVisitas'.$usuario];
        $cantidadVisitas += 1;
        setcookie("cantidadVisitas".$usuario,$cantidadVisitas,time()+3600);
    }

    header("Location: dashboard.php");
}

?>


<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Inicio Sesion</title>
  <link rel="stylesheet" href="style.css">
</head>
<body>

  <header>
    <h1 id="tituloInicioSesion">Inicio de Sesion</h1>
  </header>


    <section>
      <article class="articuloForm">
        <form action="index.php" method="post" class="formSesion">
            <label>Usuario: <input name="usuario" type="text" required></label>
            <label>Contrasenia: <input type="password" name="contrasenia" required></label>
            <button type="submit" name="btnIngresar">Ingresar</button>
        </form>
      </article>
    </section>



  <footer>
    <p>Nicolas Bustamante</p>
  </footer>

</body>
</html>