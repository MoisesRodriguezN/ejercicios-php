<?php
include_once 'Animal.php';

abstract class Ave extends Animal{
  
  public function __construct($s) {
    parent::__construct($s);
  }
  
  public function agitarAlas() {
    return "Estoy agitando mis alas<br>";
  }
  
  public function aseate() {
    return "Me estoy asendo<br>";
  }
  
  public function anda() {
    return "Estoy andando<br>";
  }
}
