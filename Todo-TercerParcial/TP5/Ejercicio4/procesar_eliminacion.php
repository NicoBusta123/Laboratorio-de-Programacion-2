<?php
if (isset($_POST['btnEliminar'])) {
    $con = new mysqli("localhost", "root", "", "inmobiliaria") or die("Error de conexión");

    $id = $_POST['idInmueble'];

    // La consulta DELETE necesita obligatoriamente el WHERE
    $sql = "DELETE FROM inmueble WHERE idInmueble = $id";

    if ($con->query($sql)) {
        // mysqli_affected_rows te dice cuántas filas se borraron
        if ($con->affected_rows > 0) {
            echo "El inmueble con ID $id fue eliminado correctamente.";
        } else {
            echo "No se encontró ningún inmueble con el ID $id.";
        }
    } else {
        echo "Error al eliminar: " . $con->error;
    }
}
?>