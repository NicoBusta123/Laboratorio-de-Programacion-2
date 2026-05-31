<?php
session_start();

    if (!isset($_SESSION['usuario'])) {
    header("Location: index.php");
    exit;
}

    echo "<h3>Cantidad de reportes generados: ".$_SESSION['cantidadGenerados']."</h3>";

    if (isset($_SESSION['pasaportes']) && !empty($_SESSION['pasaportes'])) {
        foreach ($_SESSION['pasaportes'] as $usuario) {
            echo "<h3>Nombre: ".$usuario['nombre']."</h3>";
            echo "<h3>Apellido: ".$usuario['apellido']."</h3>";
            echo "<h3>Documento: ".$usuario['documento']."</h3>";
            echo "<h3>Fecha de nacimiento: ".$usuario['fechaNacimiento']."</h3>";
            echo "<h3>Genero: ".$usuario['genero']."</h3>";
            echo "<h3>Pais: ".$usuario['pais']."</h3>";
            echo "<h3>Renueva: ".$usuario['renueva']."</h3>";
            echo "<h3>Fecha alta: ".$usuario['fechaAlta']."</h3>";
            echo "<h3>Codigo Verificador: ".$usuario['codigoVerificador']."</h3>";
            echo "<hr>"; //Separador de cada persona
    }
} else {
    echo "<p>No hay pasaportes generados aún.</p>";
}


    
    echo "<a href='formularioPasaporte.php'>Volver</a>";


?>

