
<?php

require_once "vehiculo.php";







$VehiculoElegido = $_POST['vehiculo'];
$importeIngresado = $_POST['importe'];
$total = 0;

switch($VehiculoElegido){

    case "Ford Ranger":
        $FordRanger = new Vehiculo("Ford Ranger",4,62);
        $total = $importeIngresado . $FordRanger->getConsumoTotal();
        echo "<h3>Total de unidades</h3>".$FordRanger->getCantidad();
        echo "<br><h3>Importe de combustible:</h3> ".$importeIngresado;
        echo "<br><h3>Total de combustible litros del vehiculo: </h3>".$FordRanger->getConsumoTotal();
        echo "<br><h3>Importe del combustible: </h3>".$total;
        echo "<br><a href='index.php'><button>Volver</button></a>";
        break;

    case "Toyota Hilux":
        $ToyotaHilux = new Vehiculo("Toyota Hilux",4,62);
        $total = $importeIngresado . $ToyotaHilux->getConsumoTotal();
        echo "<h3>Total de unidades</h3>".$ToyotaHilux->getCantidad();
        echo "<br><h3>Importe de combustible:</h3> ".$importeIngresado;
        echo "<br><h3>Total de combustible litros del vehiculo: </h3>".$ToyotaHilux->getConsumoTotal();
        echo "<br><h3>Importe del combustible: </h3>".$total;
        echo "<br><a href='index.php'><button>Volver</button></a>";
        break;

    
    case "Chevrolet Fluence":
        $ChevroletFluence = new Vehiculo("Chevrolet Fluence",4,62);
        $total = $importeIngresado . $ChevroletFluence->getConsumoTotal();
        echo "<h3>Total de unidades</h3>".$ChevroletFluence->getCantidad();
        echo "<br><h3>Importe de combustible:</h3> ".$importeIngresado;
        echo "<br><h3>Total de combustible litros del vehiculo: </h3>".$ChevroletFluence->getConsumoTotal();
        echo "<br><h3>Importe del combustible: </h3>".$total;
        echo "<br><a href='index.php'><button>Volver</button></a>";
        break;



        

}



?>