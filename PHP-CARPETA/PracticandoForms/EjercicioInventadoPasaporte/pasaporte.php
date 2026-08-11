<?php

class Pasaporte{
    private $nombre;
    private $apellido;
    private $dni;
    private $nacionalidad;
    private $metodoPago;
    private $codigoVerificacion;

    public function __construct($nombre,$apellido,$dni,$nacionalidad,$metodoPago)
    {
        $this->nombre = $nombre;
        $this->apellido = $apellido;
        $this->dni = $dni;
        $this->nacionalidad = $nacionalidad;
        $this->metodoPago = $metodoPago;
        $this->codigoVerificacion = $this->calcularCodigo();
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

    public function getNacionalidad(){
        return $this->nacionalidad;
    }

    public function getMetodoPago(){
        return $this->metodoPago;
    }

    public function getCodigoVerificacion(){
        return $this->codigoVerificacion;
    }

    public function calcularCodigo(){
        $anioActual = date("Y");
        $dni = $this->dni;
        $cadena = $anioActual.$dni;
        $sumatoria = 0;

        for ($i=0; $i < strlen($cadena) ; $i++) { 
            $numero = $cadena[$i];
            $numeroMultiplicado = $numero * $i;
            $sumatoria = $sumatoria + $numeroMultiplicado;
        }

        return $sumatoria;
        
    }

}


?>