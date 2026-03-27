<?php

namespace App\Controllers;
use App\Controllers\BaseController;

class Vehiculo extends BaseController
{
  // Retorna la vista para administrar vehiculos
  public function index(){

  // Los datos se pueden enviar a la vista utilizando un ARREGLO
  $data = [
    'header' => view('Partials/header'),
    'footer' => view('Partials/footer'),
  ] ; 

    return view("Modulos/vehiculos/index", $data);
  }
}

?>