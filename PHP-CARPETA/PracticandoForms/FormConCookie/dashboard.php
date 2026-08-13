<?php
session_start();

if(isset($_POST['btnCerrarSesion'])){
    header("Location: index.php");
}


?>

<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Uwu</title>
  <link rel="stylesheet" href="style.css">
</head>
<body>

  <header>
    <h1>Aca veo la cantidad de visitas</h1>
  </header>

  <main>
    <section>
      <article>
        <?php
            $usuario = $_SESSION['usuario'];
            $cantidadVisitas = $_COOKIE['cantidadVisitas'.$usuario];
            echo "La cantidad de visitas es: ".$cantidadVisitas;
        ?>
      </article>

        <article>
            <form action="dashboard.php" method="post">
                <button name="btnCerrarSesion" type="submit">CerrarSesion</button>
                
            </form>
        </article>
      
    </section>
  </main>

  <footer>
    <p>Pie de página</p>
  </footer>

</body>
</html>