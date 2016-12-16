<?php
include_once 'Mamifero.php';

class Perro extends Mamifero {
  private $raza;
  public function __construct($s, $r) {
    parent::__construct($s);
    if (isset($r)) {
      $this->raza = $r;
    } else {
      $this->raza = "Pastor Aleman";
    }
  }
  public function __toString() {
    return parent::__toString() . "<br>Raza: $this->raza";
  }
  
  public function ladra() {
    return "Guau!<br>";
  }
  
  public function sientate() {
    return "Me siento<br>";
  }
  
  public function levantate() {
    return "Me he levantado<br>";
  }
}
