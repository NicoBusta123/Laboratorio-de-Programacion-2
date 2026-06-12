<?php
include_once "conexion.php";
include_once "producto.php";

$nombreProducto = $_GET['nombreProducto'] ?? '';

$listaProductos = [];

if (!empty($nombreProducto)){
    $consulta = "SELECT nroProducto, descripcion, precio, stock from producto WHERE descripcion LIKE '%$nombreProducto%'";
    $resultadoBD = $conexion->query($consulta);


    while ($fila = $resultadoBD->fetch_object('Producto')){
        $listaProductos[] = $fila;
    }

    if (count($listaProductos)>0){
        echo json_encode($listaProductos);
    }else{
        echo json_encode(["error"=>"No se han encontrado productos con ese nombre"]);
    }
}else {
    echo json_encode(["error" => "El campo de búsqueda está vacío"]);
}


?>