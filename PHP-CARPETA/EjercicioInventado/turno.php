<?php

class Turno{
    private $nombre;
    private $apellido;
    private $dni;
    private $servicio;
    private $obraSocial;
    private $r

    public function __construct($nombre,$apellido,$dni,$servicio,$obraSocial)
    {
        $this->nombre = $nombre;
        $this->apellido = $apellido;
        $this->dni = $dni;
        $this->servicio = $servicio;
        $this-> obraSocial = $obraSocial;
    }

    public function calcularCosto(){
        switch ($this->servicio){
            case "ortodoncia":
                $this->
        }
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



}

?>