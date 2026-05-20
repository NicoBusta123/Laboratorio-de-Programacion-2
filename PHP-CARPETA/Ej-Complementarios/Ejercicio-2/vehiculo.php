<?php

class Vehiculo{
    private $Marca;
    private $Cantidad;
    private $Consumo;

    public function __construct ($Marca,$Cantidad,$Consumo)
    {
        $this->Marca = $Marca;
        $this->Cantidad = $Cantidad;
        $this->Consumo = $Consumo;
    }

    public function getMarca(){
        return $this->Marca;
    }

    public function getCantidad(){
        return $this->Cantidad;
    }

    public function getConsumo(){
        return $this->Consumo;
    }

    public function getConsumoTotal(){
        return $this->Cantidad . $this->Consumo;
    }


}




?>