<?php
session_start();
if (isset($_POST['btnCerrarSesion'])){
    session_destroy();
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
    <h1 id="idTitulo">Contador de Palabras</h1>
  </header>
  <section>

    <article>
      <form id="form" method="post" action="index.php">
        <span>Ingresa una palabra</span><input id="idPalabra" name="palabra" type="text">
        <button name="btnIngresar" type="submit">Ingresar</button>
        <button name="btnCerrarSesion" type="submit">Cerrar Sesion</button>
      </form>
    </article>

    <article>
        <?php

            if (isset($_POST['btnIngresar'])){
                
                if(isset($_SESSION['Palabras'])){
                    
                    $_SESSION['Palabras'][] = $_POST['palabra'];
                }else{
                    $_SESSION['Palabras'] = [];
                    $_SESSION['Palabras'][] = $_POST['palabra'];
                }

                foreach ($_SESSION['Palabras'] as $palabra) {
                    echo "<h3>".$palabra.", La longitud de la cadena es: ".strlen($palabra)."</h3>";
                }

            }

        ?>
    </article>

  </section>
  <footer>
    
  </footer>
</body>
</html>