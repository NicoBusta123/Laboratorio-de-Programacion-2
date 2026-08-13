<?php

class Reserva{

    private $nombre;
    private $apellido;
    private $tipoCancha;
    private $horas;
    private $servicios;
    private $socio;
    private $precio;
    private $fecha;


    public function __construct($nombre,$apellido,$tipoCancha,$horas,$servicios,$socio)
    {
       $this->nombre = $nombre;
       $this->apellido = $apellido;
       $this->tipoCancha = $tipoCancha;
       $this->horas = $horas;
       $this->servicios = $servicios;
       $this->socio = $socio;
       $this->fecha = date("Y-d-m");
       $this->precio = $this->calcularPrecio();
    }

    public function getNombre(){
        return $this->nombre;
    }
    public function getApellido(){
        return $this->apellido;
    }
    public function getTipoCancha(){
        return $this->tipoCancha;
    }
    public function getHoras(){
        return $this->horas;
    }
    public function getServicios(){
        return $this->servicios;
    }
    public function getSocio(){
        return $this->socio;
    }
    public function getPrecio(){
        return $this->precio;
    }
    public function getFecha(){
        return $this->fecha;
    }

    public function calcularPrecio(){
        $precio = 0;
        
        switch ($this->tipoCancha) {
            case 'f5':
                $precio += 12000;
                break;
            
            case 'padel':
                $precio += 8000;
                break;

            case 'tenis':
                $precio += 10000;
                break;
            
        }

        foreach ($this->servicios as $servicio) {
            switch ($servicio) {
            case 'iluminacion':
                $precio += 3000;
                break;
            
            case 'equipamiento':
                $precio += 2000;
                break;

            case 'vestuario':
                $precio += 1500;
                break;
        }

        if ($this->socio == "si"){
            $descuento = $precio * 0.15;
            $precio -= $descuento;
        }

        }

        return $precio;
    }








}


?>