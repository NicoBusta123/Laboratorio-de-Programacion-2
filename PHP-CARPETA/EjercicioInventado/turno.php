<?php

class Turno{
    private $nombre;
    private $apellido;
    private $dni;
    private $servicio;
    private $obraSocial;
    private $total;

    public function __construct($nombre,$apellido,$dni,$servicio,$obraSocial)
    {
        $this->nombre = $nombre;
        $this->apellido = $apellido;
        $this->dni = $dni;
        $this->servicio = $servicio;
        $this-> obraSocial = $obraSocial;
        $this->total = $this->calcularCosto();
    }

    public function calcularCosto(){
        $costo = 0;
        switch ($this->servicio){
            case "ortodoncia":
                $costo = 4000;
                break;
            case "implantes":
                $costo = 7000;
                break;
            case "odontoPediatria":
                $costo = 3000;
                break;
        }

        if ($this->obraSocial == "si"){
            $costo -= $costo * 0.20;
        }

        return $costo;
    }


    public function getNombre(){
        return $this->nombre;
    }

    public function getApellido(){
        return $this->apellido;
    }

    public function getDni(){
        return $this->dni;
    }

    public function getObraSocial(){
        return $this->obraSocial;
    }
    
    public function getTotal(){
        return $this->total;
    }

    public function getServicio(){
        return $this->servicio;
    }


}

?>