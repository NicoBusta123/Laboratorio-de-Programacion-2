<?php
include_once ("script.php");
include_once("jugador.php");
session_start();



$jugador = $_SESSION["jugador"];
$maquina = $_SESSION["maquina"];

$jugadorActual = $_SESSION["jugadorActual"];
$jugador2 = $_SESSION["jugador2"];





/*Aca toda la logica cuando tiramos */
if ( isset($_POST['tirar']) && $_POST['tirar'] == "tirar"){
    $numRandom = tirar();
    $tiradas = $_SESSION['tiradas'];
    $tiradas += 1;
    $_SESSION['tiradas'] = $tiradas;


   


    switch($numRandom){
        case 1:
            $jugadorActual->setPuntos(6);
            $jugador2->setPuntos(-6);
            
        break;


        case 2:
          break;
    
         

        case 3:
            $jugadorActual->setPuntos(-2);
            $jugador2->setPuntos(4);
            
        break;


        case 4:
            $jugadorActual->setPuntos(4);
            $jugador2->setPuntos(-2);
        break;

        case 5:
            $jugadorActual->setPuntos(-3);
            $jugador2->setPuntos(-3);
            
        break;


        case 6:
            $jugadorActual->setPuntos(1);
            $jugador2->setPuntos(-3);
            
        break;


    }

      echo "<h3>Tirada: </h3>".$tiradas;
      echo "<br><br>";
      echo "<h3>Jugador Actual:".$jugadorActual->getNombre()."</h3>";
      echo "<br><br>";
      echo "<h3>Puntos de ".$jugadorActual->getNombre().": ".$jugadorActual->getPuntos()."</h3>";
      echo "<br><br>";
      echo "<h3>Puntos de ".$jugador2->getNombre().$jugador2->getPuntos()."</h3>";
      echo "<br><br>";

    if ( $jugadorActual->getPuntos() <= 0 || $jugador2->getPuntos() <= 0){
          echo "La partida termino!";

          if($jugadorActual->getPuntos()>0){
            echo "El ganador es: ".$jugadorActual->getNombre();
            $jugadorActual->setGanadas();
            $jugadorActual->resetearPuntos();
            $jugador2->resetearPuntos();

            if ($jugadorActual->getNombre() != "maquina"){
              $json = json_encode($jugadorActual);

            setcookie(
              $jugadorActual->getNombre(),
              $json,
              time()+3600
            );

            }
            
          
        

          }else{
            echo "El ganador es: ".$jugador2->getNombre();
            
            $jugadorActual->resetearPuntos();
            $jugador2->resetearPuntos();

            

          
            
          };



    };

    $aux = $jugadorActual;
    $jugadorActual = $jugador2;
    $jugador2 = $aux;


    $_SESSION["jugadorActual"] = $jugadorActual;
    $_SESSION["jugador2"] = $jugador2;


}


if ( isset($_POST['abandonar']) && $_POST['abandonar'] =="abandonar" ){
          session_destroy();
          header("Location: inicio.php");
          exit;
}




?>

<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Juego Dados</title>
  <link rel="stylesheet" href="style.css">
</head>
<body>

  <header>
    <h1 class="titulo">Juego de DADOS</h1>
  </header>

  <main>

    <section>
      <article class="tablaJuego">
      </article>
    </section>

    <section>
        <form action="dados.php" method="post">
            <button name="tirar" type="submit" value="tirar">Tirar</button>
            <button name="abandonar" type="submit" value="abandonar">Abandonar</button>
        
        </form>

        <h3>Cantidad de ganadas: <?php echo "".$jugador->getGanadas();  ?></h3>
        
    </section>

  </main>

  <footer>
    <p>Nicolas Bustamante</p>
  </footer>

</body>
</html>