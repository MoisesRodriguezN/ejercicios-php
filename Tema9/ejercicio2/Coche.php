<?php
include_once 'Vehiculo.php';

class Coche extends Vehiculo {
  
  function __construct() {
    parent::__construct();
  }

  public function quemaRueda() {
    echo "Quemando ruedas con el coche";
  }
  
}
