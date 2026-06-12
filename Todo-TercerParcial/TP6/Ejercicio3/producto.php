<?php

class Producto{
    public $nroProducto;
    public $descripcion;
    public $precio;
    public $stock;

    public function __construct() {
    }


    public function getNroProducto(){
        return $this->nroProducto;
    }

    public function getDescripcion(){
        return $this->descripcion;
    }

    public function getPrecio(){
        return $this->precio;
    }

    public function getStock(){
        return $this->stock;
    }






}


?>