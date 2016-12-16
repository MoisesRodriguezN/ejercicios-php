<?php
include_once 'Ave.php';

class Pinguino extends Ave {
  public function __construct($s) {
    parent::__construct($s);
  }

  public function entraAlAgua() {
    return "Voy al agua<br>";
  }
  
  public function nada() {
    return "Estoy nandando<br>";
  }
  
  public function agitarAlas() {
    return "Los pinguinos no podemos agitar las alas<br>";
  }
}
