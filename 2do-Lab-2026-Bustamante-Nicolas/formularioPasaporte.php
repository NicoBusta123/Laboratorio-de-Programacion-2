<?php
session_start();
include_once "calculos.php";


if (!isset($_SESSION['usuario'])) {
    header('Location: index.php');
    exit;
}

// 2. Procesar botones (sin importar si vino de 'btnIngresar' o no)
if (isset($_POST['btnGenerar'])) {
    // Inicializar el array si no existe
    if (!isset($_SESSION['pasaportes'])) {
        $_SESSION['pasaportes'] = [];
    }
    
    $_SESSION['cantidadGenerados'] = ($_SESSION['cantidadGenerados'] ?? 0) + 1;
    
    $persona = [
        "nombre"=> $_POST['nombre'],
        "apellido"=> $_POST['apellido'],
        "documento"=> $_POST['documento'],
        "fechaNacimiento"=> $_POST['fechaNacimiento'],
        "genero"=> $_POST['genero'],
        "pais"=> $_POST['pais'],
        "renueva"=> $_POST['renueva'],
        "codigoVerificador" => calcularCodigo($_POST['documento']),
        "fechaAlta" => date("Y-m-d")
    ];

    $_SESSION['pasaportes'][] = $persona;
    echo "Pasaporte generado correctamente.";
}

if (isset($_POST['btnSalir'])) {
    session_destroy();
    header("Location: index.php");
    exit;
}

if (isset($_POST['btnVerificar'])) {
    header("Location: verificar.php");
    exit;
}

if (isset($_POST['btnReportes'])) {
    header("Location: pasaportes.php");
    exit;
}
?>
  


<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>1er Lab 2026 Bustamante Nicolas </title>
  <link rel="stylesheet" href="style.css">
</head>
<body>
  <header>
    <form method="post" action="formularioPasaporte.php" class="form" name="formPasaporte">
        <button name="btnReportes" type="submit">Reportes</button>
        <button name="btnVerificar" type="submit">Verificar pasaporte</button>
        <button name="btnSalir" type="submit">Salir</button>

    </form>
    

  </header>
  <section id="seccionForm" class="form" >
    <h1 class="titulo">Formulario de Pasaporte</h1>
    <form id="form" method="post" action="formularioPasaporte.php">
        <span>Ingrese su nombre <input id="nombre" type="text" required name="nombre"></span><br><br>
        <span>Ingrese su apellido <input id="apellido" type="text" required name="apellido"></span><br><br>
        <span>Numero de documento <input id="documento" type="number" required name="documento"></span><br><br> 
        <span>Ingrese su fecha de nacimiento: <input id="fechaNacimiento" type="date" required name="fechaNacimiento"></span><br><br>
        <h3>Genero: </h3>
            <span>Masculino <input value="Masculino" name="genero" type="radio" required></span>
            <span>Femenino <input value="Femenino" name="genero" type="radio" required></span>
            <span>Indistinto <input value="Indistinto" name="genero" type="radio" required></span>
        <br><br>

        <h3>Pais de origen:</h3>
            <span>Argentina <input value="Argentina" name="pais" type="radio" required></span>
            <span>Brasil <input value="Brasil" name="pais" type="radio" required></span>
            <span>Chile <input value="Chile" name="pais" type="radio" required></span>
            <span>Colombia <input value="Colombia" name="pais" type="radio" required></span>
            <span>Peru <input value="Peru" name="pais" type="radio" required></span>
            <span>Uruguay<input value="Uruguay" name="pais" type="radio" required></span>
            
        <h3>Renueva pasaporte</h3>
            <span>Si <input value="si" type="radio" name="renueva"></span>
            <span>No <input value="no" type="radio" name="renueva"></span>
        
        <br><br>
        <button type="submit" name="btnGenerar">GenerarPasaporte</button>
        
    </form>
  </section>


  <footer>
    
  </footer>
</body>
</html>
