<?php
class Ticket {
    private $nombre;
    private $apellido;
    private $documento;
    private $vehiculo;
    private $servicios;
    private $pagos;
    private $fecha;
    private $factura;
    private $email;
    private $total;
    

    public function __construct($nombre, $apellido, $documento, $vehiculo, $servicios, $pagos,$factura,$email) {
        $this->nombre = $nombre;
        $this->apellido = $apellido;
        $this->documento = $documento;
        $this->vehiculo = $vehiculo;
        $this->servicios = $servicios; // Esto sería un array
        $this->pagos = $pagos; // Esto sería un array
        $this->fecha = date("Y-m-d");
        $this->factura = $factura;
        $this->email = $email;
        $this-> total = $this->calcularTotal();
    }

    // El cálculo del precio le pertenece al Ticket, no a una función suelta
    public function calcularTotal() {
        $total = 0;
        $precios = [
            "lavadochasis" => 20000,
            "lavadomotor" => 5000,
            "interior" => 5000,
            "lavadointeriorChasis" => 22000,
            "encerado" => 5000
        ];

        foreach ($this->servicios as $servicio) {
            if (isset($precios[$servicio])) {
                $total += $precios[$servicio];
            }
        }

        // Aplicar descuentos o recargos según vehículo
        if ($this->vehiculo == "moto") {
            $total *= 0.80; // -20%
        } elseif ($this->vehiculo == "camioneta") {
            $total *= 1.20; // +20%
        }

        return $total;
    }

    // Getters necesarios para imprimir (ej. getDocumento, getTotal, etc.)
    public function getDocumento() {
        return $this->documento;
    }

    public function getNombre(){
        return $this->nombre;
    
    }

    public function getApellido(){
        return $this->apellido;
    }

    public function getVehiculo(){
        return $this->vehiculo;
    }

    public function getServicios(){
        return $this->servicios;
    }

    public function getPagos(){
        return $this->pagos;
    }

    public function getFecha(){
        return $this->fecha;
    }

    public function getFactura(){
        return $this->factura;
    }

    public function getEmail(){
        return $this->email;
    }


    public function getTotal(){
        return $this->total;
    }
}

?>