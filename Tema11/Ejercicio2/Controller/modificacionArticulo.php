<?php
  require_once '../Model/Articulo.php';
  $datosArticulo = Articulo::getArticuloById($_GET['id']);
  include '../View/formularioModificaArticulo.html.twig';
