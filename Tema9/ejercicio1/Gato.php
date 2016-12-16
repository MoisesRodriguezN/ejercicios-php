<?php
include_once 'Mamifero.php';

class Gato extends Mamifero {
  private $raza;
  public function __construct($s, $r) {
    parent::__construct($s);
    if (isset($r)) {
      $this->raza = $r;
    } else {
      $this->raza = "persa";
    }
  }
  public function __toString() {
    return parent::__toString() . "<br>Raza: $this->raza";
  }
  
  public function maulla() {
    return "Miauu<br>";
  }
  
  public function afilarUnias() {
    return "Me estoy afilando las uñas<br>";
  }
  
  public function salta() {
    return "Saltando muy alto<br>";
  }
}
