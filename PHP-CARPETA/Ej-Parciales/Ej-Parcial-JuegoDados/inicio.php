<?php
include_once ("jugador.php") ;

session_start();



if ( isset($_POST['btningresar'] ) && $_POST['btningresar'] == "ingresar"){
    $nombre = $_POST['nombre'];
    



    $jugador = new jugador($nombre);

    if(isset($_COOKIE[$nombre])){

    $datos = json_decode($_COOKIE[$nombre], true);

    $jugador->setCantidadGanadas($datos["cantidadGanadas"]);
}

    $maquina = new jugador("maquina");

    $json = json_encode($jugador);
    

    if (!isset ($_COOKIE[$nombre])){
        setcookie(
        $nombre,
        $json,
        time()+3600
    );

    }
    

    $_SESSION["jugador"] = $jugador;
    $_SESSION["maquina"] = $maquina;
    $_SESSION["jugadorActual"] = $jugador;
    $_SESSION["jugador2"] = $maquina;
    $_SESSION['tiradas'] = 0;

    header("Location: dados.php");
    exit;

}


?>

<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Inicio Sesion</title>
  <link rel="stylesheet" href="style.css">
  <script src="script.js" defer></script>
</head>
<body>

  <header>
    <h1 class="titulo">Inicio de sesion</h1>
  </header>

  <main>
    <section>
        <span>Ingresar nombre</span>
        <br><br>

        <form action="inicio.php" method="post">
            <input type="text" name="nombre" required>
            <button name="btningresar" value="ingresar" type="submit">Ingresar</button>
        </form>
        
    </section>
  </main>

  <footer>
    <p>Pie de página</p>
  </footer>

</body>
</html>