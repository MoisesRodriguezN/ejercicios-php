<?php
abstract class Animal {
  private $sexo;
  
  public function __construct($s = "macho") {
    $this->sexo = $s;
  }
  public function __toString() {
    return "Sexo: $this->sexo";
  }
  public function getSexo() {
    return $this->sexo;
  }
  public function secate() {
    return "Me pondré un rato al sol<br>";
  }
  public function salta() {
    return "Estoy saltando<br>";
  }
}
