<?php
session_start();
include_once("script.php");

if(!isset($_SESSION['intentos'])){
    $_SESSION['intentos'] = 0;
}

$intentos = $_SESSION['intentos'];

if (!isset($_COOKIE['cantJuegos'])){
    $cantJuegos = 0;
}else{
    $cantJuegos = $_COOKIE['cantJuegos'];
}

if (!isset($_SESSION['numIngresados'])){
    $_SESSION['numIngresados'] = [];
}

$numIngresados = $_SESSION['numIngresados'];

?>
<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Juego</title>
  <link rel="stylesheet" href="style.css">
</head>
<body>

  <header>
    <h1>Centro Numerico SAQUED!</h1>
  </header>

  <main>
    <section>
      <article>

        <?php

        if (isset($_POST['btnverificar']) && $_POST['btnverificar'] === 'verificar'){

            // verificar limite de intentos
            if($intentos < 10){

                $intentos += 1;
                $_SESSION['intentos'] = $intentos;

                $numero = $_POST['numero'];

                // guardar numeros ingresados
                $numIngresados[] = $numero;
                $_SESSION['numIngresados'] = $numIngresados;

                echo "<h3>Cantidad de intentos: ".$intentos."</h3>";

                echo "<h3>Numeros ingresados:</h3>";

                foreach ($numIngresados as $numIngresado) {
                    echo $numIngresado . "<br>";
                }

                // verificar centro numerico
                if (esCentroNumerico($numero)){

                    echo "<h2>Has adivinado! El numero ".$numero." es centro numerico!</h2>";

                    $cantJuegos += 1;

                    setcookie("cantJuegos", $cantJuegos, time()+3600);

                    // reiniciar juego
                    $_SESSION['intentos'] = 0;
                    $_SESSION['numIngresados'] = [];

                }else{

                    echo "<h3>El numero ".$numero." NO es centro numerico</h3>";

                    // verificar si perdio
                    if($intentos >= 10){

                        echo "<h2>Perdiste! Se acabaron los intentos</h2>";

                        $cantJuegos += 1;

                        setcookie("cantJuegos", $cantJuegos, time()+3600);

                        // reiniciar juego
                        $_SESSION['intentos'] = 0;
                        $_SESSION['numIngresados'] = [];
                    }
                }

            }

        }

        // rendirse
        if (isset($_POST['btnrendirse']) && $_POST['btnrendirse'] === 'rendirse'){

            $cantJuegos += 1;

            setcookie("cantJuegos", $cantJuegos, time()+3600);

            $_SESSION['intentos'] = 0;
            $_SESSION['numIngresados'] = [];

            echo "<h2>Te has rendido!</h2>";
            echo "<h3>Cantidad de juegos: ".$cantJuegos."</h3>";
        }

        ?>

        <form id="form" name="form" method="post" action="index.php">

          <span>Ingresa un numero</span><br><br>

          <input type="number" required name="numero">

          <button name="btnverificar" id="btnverificar" type="submit" value="verificar">
            Verificar
          </button>

          <button name="btnrendirse" id="btnrendirse" type="submit" value="rendirse">
            Rendirse
          </button>

        </form>

      </article>
    </section>
  </main>

  <footer>
    <p>Nicolas Bustamante</p>
  </footer>

</body>
</html>