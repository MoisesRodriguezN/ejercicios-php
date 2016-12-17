<?php
include_once 'Vehiculo.php';

class Bicicleta extends Vehiculo {
  
  private $tipo;
  
  function __construct($tipoBici) {
    parent::__construct();
    $this->tipo = $tipoBici;
  }

  public function hazElCaballito() {
    if($this->tipo == "campo"){
      echo "Estoy haciendo el caballito sobre una roca<br>";
    } elseif ($this->tipo == "carretera") {
      echo "Haciendo el caballito sobre la carretera<br>";
    }
  }
  
}
