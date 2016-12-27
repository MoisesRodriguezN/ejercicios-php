<?php

require_once 'BlogDB.php';

class Articulo {
  private $id;
  private $titulo;
  private $fecha;
  private $contenido;
  
  function __construct($id, $titulo, $fecha, $contenido) {
    $this->id = $id;
    $this->titulo = $titulo;
    $this->fecha = $fecha;
    $this->contenido = $contenido;
  }

  function getId() {
    return $this->id;
  }

  function getTitulo() {
    return $this->titulo;
  }

  function getFecha() {
    return $this->fecha;
  }

  function getContenido() {
    return $this->contenido;
  }
  
  public static function getArticulos(){
    $conexion = BlogDB::connectDB();
    $seleccion = "SELECT id, titulo, fecha, contenido FROM articulo";
    $consulta = $conexion->query($seleccion);
    
    $articulos = [];
    
    while ($registro = $consulta->fetchObject()) {
      $articulos[] = new Articulo($registro->id, $registro->titulo, $registro->fecha, $registro->contenido);
    }
    
    return $articulos;
  }
  
  public function insert(){
    $conexion = BlogDB::connectDB();
    $insercion = "INSERT INTO articulo (titulo, fecha, contenido) VALUES (\"".$this->titulo."\", \"".$this->fecha."\", \"".$this->contenido."\")";
    $conexion->exec($insercion);
  }
  
  public function delete(){
    $conexion = BlogDB::connectDB();
    $borrado = "DELETE FROM articulo WHERE id=\"".$this->id."\"";
    $conexion->exec($borrado);
  }
}
