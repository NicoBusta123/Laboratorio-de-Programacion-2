<?php

class jugador{

    public $nombre;
    public $puntos;
    public $cantidadGanadas;

    public function __construct ($nombre){
        $this->nombre = $nombre;
        $this->puntos = 20;
        $this->cantidadGanadas = 0;
    }

    public function getNombre(){
        return $this->nombre;

    }

    public function getPuntos(){
        return $this->puntos;
    }

    public function setPuntos($numero){
        $this->puntos += $numero;
    }

    public function resetearPuntos(){
        $this->puntos = 20;
    }

    public function setGanadas(){
        $this->cantidadGanadas ++;
    }

    public function getGanadas(){
        return $this->cantidadGanadas;
    }

    public function setCantidadGanadas($cantidad){
    $this->cantidadGanadas = $cantidad;
}



}



?>