<?php

class Vehiculo {
  
  //Variables de clase
  private static $kmTotales = 0;
  private static $vehiculosCreados = 0;
  
  //Variable instancia
  private $kmRecorridos;
  
  
  public static function getKmTotales() {
    return self::$kmTotales;
  }
  
  public static function getVehiculosCreados() {
    return self::$vehiculosCreados;
  }
  
  //Al crear un vehículo, se cumará 1 al contador de Vehiculos Creados
  //Se le pone los km recorridos a 0;
  function __construct() {
    self::$vehiculosCreados++;
    $this->kmRecorridos = 0;
  }
  
  public function getKmRecorridos() {
    return $this->kmRecorridos;
  }
 
  //Recorrido del coche. Suma km del vehiculo y el total de Km recorrido por todos
  //los vehículos.
  public function recorre($km) {
    $this->kmRecorridos += $km;
    self::$kmTotales += $km;
  }

}
