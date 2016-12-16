<?php
include_once 'Ave.php';

class Canario extends Ave {
  public function __construct($s) {
    parent::__construct($s);
  }
  
  public function pia() {
    return "pi pio pio<br>";
  }
  
  public function sientate() {
    return "Me siento<br>";
  }
  
  public function aseate() {
    return parent::aseate() . "A los canarios no nos gusta asearnos<br>";
  }
}
