<?php
include_once 'Mamifero.php';

class Lagarto extends Animal {
  public function __construct($s) {
    parent::__construct($s);
  }

  public function escondete() {
    return "No me vas a encontrar<br>";
  }
  
  public function nada() {
    return "Estoy nandando<br>";
  }
  
  public function agitarAlas() {
    return parent::agitarAlas() . "Los pinguinos no podemos<br>";
  }
}
