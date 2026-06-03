<?php
if (isset($_POST['btnModificar'])) {
    $con = new mysqli("localhost", "root", "", "inmobiliaria");

    // Recibimos los datos
    $id = $_POST['idInmueble'];
    $tipo = $_POST['tipoInmueble'];
    $domicilio = $_POST['domicilio'];
    $dormitorios = $_POST['cantidadDormitorios'];
    $mejoras = $_POST['mejoras'];
    $banios = $_POST['cantidadBanios'];
    $obs = $_POST['observacion'];

    
    //El WHERE es fundamental para no modificar toda la tabla, seteo el inmueble cuando el id sea el ingresado
    $sql = "UPDATE inmueble SET 
            tipoInmueble = '$tipo', 
            domicilio = '$domicilio', 
            cantidadDormitorios = $dormitorios, 
            mejoras = '$mejoras', 
            cantidadBanios = $banios, 
            observacion = '$obs' 
            WHERE idInmueble = $id";

    if ($con->query($sql)) {
        echo "Los datos fueron modificados correctamente.";
    } else {
        echo "Error: " . $con->error;
    }
}
?>