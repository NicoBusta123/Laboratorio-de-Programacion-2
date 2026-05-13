<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Ejercicio 6</title>
  <link rel="stylesheet" href="style.css">
</head>
<?php
session_start();
if (isset($_SESSION['usuario'])){
    header("Location: script.php");
    exit;
}

?>

<body>

  <header>
    <h1 id="titulo">Inicio de Sesion</h1>
  </header>

  <main>
    <section>
        <form id="form" name="form" method="post" action="script.php">
            <span>Ingresar nombre de usuario</span>
            <input 
              name="usuario"
              type="text"
              value="<?php echo isset($_COOKIE['usuario']) ? $_COOKIE['usuario'] : ''; ?>"
              required
              >
            <br><br>


            <span>Ingresar contrasenia</span>
            <input 
              name="contrasenia"
              type="password"
              value="<?php echo isset($_COOKIE['contrasenia']) ? $_COOKIE['contrasenia'] : ''; ?>"
              required
              >
            <br><br>

            <span>Recordar mis datos en este equipo</span>
            <input type="checkbox" value="recordarme" name="recordarme">
            <br><br>

            <span>Recordar mi contrasenia</span>
            <input type="checkbox" value="recordarContrasenia" name="recordarContrasenia">
            <br><br>

            <button name="acceder" type="submit" value="acceder">Acceder</button>
        </form>
    </section>
  </main>

  <footer>
    <p>Nicolas Bustamante</p>
  </footer>

</body>
</html>