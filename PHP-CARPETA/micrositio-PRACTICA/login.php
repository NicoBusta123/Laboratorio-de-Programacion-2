<?php
session_start();




if (isset (  $_POST['ingresar']  ) || isset($_SESSION['usuario'] ) ){
    
    if (!isset($_SESSION['usuario'])){
        $_SESSION['usuario'] = $_POST['usuario'];
    }

?>
<link rel="stylesheet" href="assets/css/styles.css">
<div class="dashboard">

    <header>
        <h1>Panel Principal</h1>

        <form action="logout.php" method="post">
            <button class="logout" id="logout" name="logout" type="submit">Cerrar Sesión</button>
        </form>

        


        
        
    </header>

    <main>
        <div class="box">
            
            <?php
            echo "<h3 id='mensajeUsuario'>"."Bienvenido! ".$_SESSION['usuario']."</h3>";
            ?>

            <p>Zona privada del sistema.</p>
        </div>

        <div class="box">
            <h3>Configuración</h3>
            <p>Opciones del sistema.</p>
        </div>
    </main>

</div>

<?php
}else{
?>

<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Login</title>
<link rel="stylesheet" href="assets/css/styles.css">
</head>
<body>
<main class="contenedor">
    <form class="card" id="frm_login" method="post">
        <h2>Iniciar Sesión</h2>

        <input type="text" placeholder="Usuario o Email" name="usuario" id="usuario" required>
        <input type="password" placeholder="Contraseña" name="password" id="password" required>

        <button type="submit" name="ingresar" >Ingresar</button>

        <p>No tienes cuenta?</p>
        <a href="registro.html">Registrarse</a>
    </form>
</main>
</body>
</html>

<?php
}
?>