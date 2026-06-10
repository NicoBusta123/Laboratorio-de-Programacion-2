<?php
include_once "conexion.php";

$nombreProducto = $_GET['nombreProducto'] ?? '';

$listaProductos = [];

if (!empty($nombreProducto)){
    $consulta = "SELECT nroProducto, descripcion from producto WHERE CONTAINS(descripcion,'$nombreProducto')";
    $resultadoBD = $conexion->query($consulta);


    while ($fila = $resultadoBD->fetch_object()){
        $listaProductos = $fila;
    }

    if (count($listaProductos)>0){
        echo json_encode($listaProductos);
    }else{
        echo json_encode(["error"=>"No se han encontrado productos con ese nombre"]);
    }
}


?>