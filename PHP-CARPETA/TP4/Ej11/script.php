<?php
if (isset($_POST['btnIngresar'])){

    $nombre = $_POST['nombre'];


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
    <h1>Resumen de visitas!</h1>
  </header>
  <section>
    <article>
      <?php
        
        if (!isset($_COOKIE['visitas_'.$nombre])){
            $visitas = 1;
            setcookie('visitas_'.$nombre,$visitas, time()+3600);
            echo $nombre." es tu primera visita!!";
        }else{
            $visitas = $_COOKIE['visitas_'.$nombre];
            $visitas = $visitas + 1;
            setcookie('visitas_'.$nombre,$visitas, time()+3600);
            echo $nombre." es tu visita numero: ".$visitas;
        }
        
      ?>
    </article>

    <a href="index.php">Volver al inicio</a>
  </section>
  <footer>
    
  </footer>
</body>
</html>

<?php
}
?>