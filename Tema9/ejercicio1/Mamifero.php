<?php
include_once 'Animal.php';

abstract class Mamifero extends Animal{
  
  public function __construct($s) {
    parent::__construct($s);
  }
  
  public function beberAgua() {
    return "Estoy bebiendo agua<br>";
  }
  
  public function amamanta() {
    if (($this->getSexo()) == "hembra") {
      echo "Estoy amamantando a mis crias<br>";
    }else{
      echo "No puedo, soy macho<br>";
    }
  }
  
  public function come() {
    return "Que bueno está lo que estoy comiendo<br>";
  }
}
