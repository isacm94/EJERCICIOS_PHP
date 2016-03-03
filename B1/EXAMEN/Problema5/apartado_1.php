<?php // Solo modificar entre <Modificable> y </Modificable>
/** 
 * APARTADO 1
 */

class Vehiculo {
    protected $velocidad = 0;
    protected $nombre='';
    protected $aceleracion=1;

    public function __construct($nombre, $vIni, $aceleracion=1) {
        $this->velocidad=$vIni;
        $this->nombre=$nombre;
        $this->aceleracion=$aceleracion;
    }
    public function Acelerar(){
        $this->velocidad+=$this->aceleracion;
    }
    public function Ver()
    {
        echo "<p><strong>".$this->nombre."</strong> Velocidad=[".$this->velocidad."]</p>"; 
    }
}
/************************************************** 
 * De aquí para arriba no se puede modificar nada 
 ***************************************************/
//
// <Modificable>
//
class Camion extends Vehiculo {
    public function __construct($nombre, $vIni=2, $aceleracion=2) {
        parent::__construct($nombre, $vIni, $aceleracion);
    }
}

class Deportivo extends Vehiculo {
    public function __construct($nombre, $vIni=3, $aceleracion=3) {
        parent::__construct($nombre, $vIni, $aceleracion);
    }
}

class Moto extends Vehiculo {
    public function __construct($nombre, $vIni= -27, $aceleracion=3) {
        parent::__construct($nombre, $vIni, $aceleracion);
    }
}
//
// </Modificable>
//
/************************************************** 
 * De aquí para abajo no se puede modificar nada 
 ***************************************************/
$misVehiculos = array(
    new Camion('Volvo'), new Moto('Honda'), new Deportivo('Ferrari')
);

for($i=1; $i<50; $i++) {
    foreach($misVehiculos as $vehiculo) {
        $vehiculo->Acelerar();
    }
}
echo "<h1>Mis veh&iacute;culos</h1>";
foreach($misVehiculos as $vehiculo) {
    $vehiculo->Ver();
}
