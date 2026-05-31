<?php
if (isset ($_POST['btnIngresar'])){
    $con = new mysqli("localhost","root","","inmobiliaria") or die("No se pudo establecer la conexion con la base de datos");

    $tipo_inmueble = $_POST['tipo_Inmueble'];
    $domicilio = $_POST['domicilio'];
    $cantidad_dormitorios = $_POST['cantidad_dormitorios'];
    $mejoras = $_POST['mejoras'];
    $cantidad_baños = $_POST['cantidad_baños'];
    $observaciones = $_POST['observaciones'];

    $query = "INSERT INTO inmobiliaria (tipo_inmueble,domicilio,cantidad_dormitorios,mejoras,cantidad_baños,observaciones) ";
    
    $query.= "VALUES (";
    $query.= ;
    $query.= ")";

    $con->query($query) or die("No se pudo completar la consulta de insertar el inmueble");
    echo "El inmueble fue dado de alta!";

    $queryMostrar = "SELECT tipo_inmueble, domicilio, cantidad_dormitorios, mejoras, cantidad_baños, observaciones from inmobiliaria";
    $resultado = $con->query($queryMostrar) or die("No se pudo completar la consulta de mostrar");

    while ($registro = $resultado->fetch_object()){
        echo "<h3>Estos son los inmuebles encontrados</h3>";
        echo "<hr>";
        echo "<h3>Tipo de inmueble: ".$registro->tipo_inmueble."<h3><br><br>";
        echo "<h3>Domicilio: ".$registro->domicilio."<h3><br><br>";
        echo "<h3>Cantidad de dormitorios: ".$registro->cantidad_dormitorios."<h3><br><br>";
        echo "<h3>Mejoras: ".$registro->mejoras."<h3><br><br>";
        echo "<h3>Cantidad de baños: ".$registro->cantidad_baños."<h3><br><br>";
        echo "<h3>Observaciones: ".$registro->observaciones."<h3><br><br>";
        echo "<hr>";
    }
    echo "<a href='inmuebles.php'>Volver</a>";


}else{





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
    <h1 class="titulo">Alta de muebles</h1>
  </header>
  <section>
    <article>
      <form action="inmuebles.php" class="form" method="post"> 
        <span>Tipo de inmueble</span>
        <input type="text" name="tipo_Inmueble">
        <br><br>
        <span>Domicilio</span>
        <input type="text" name="domicilio">
        <br><br>
        <span>Cantidad de dormitorios</span>
        <input type="number" name="cantidad_dormitorios">
        <br><br>
        <span>Mejoras</span>
        <input type="text" name="mejoras">
        <br><br>
        <span>Cantidad baños</span>
        <input type="number" name="cantidad_baños">
        <br><br>
        <span>Observaciones</span>
        <input type="text" name="observaciones">
        <br><br>
        <button type="submit" name="btnIngresar">Ingresar Inmueble</button>
      </form>
    </article>
  </section>
  <footer>
    
  </footer>
</body>
</html>
<?php
}
?>