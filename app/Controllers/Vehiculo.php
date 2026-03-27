<?php

namespace App\Controllers;
use App\Controllers\BaseController;
use App\Models\VehiculoModel;

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

  //El controlador SERVIRA resultados asincronos, por lo tanto se requiere:
  //1. codigo de servidor https://developer.mozilla.org/es/docs/Web/HTTP/Reference/Status
  //2. Resultado en formato JSON
  public function getVehiculos(){
    //Se requiere del modelo
    $vehiculo = new VehiculoModel();
    return $this->response->setJSON($vehiculo->ObtenerVehiculos());
  }

  public function registrarVehiculo(){
    $vehiculo = new VehiculoModel();

    //Todos los campos requeridos, deberán ser enviados en un JSON
    $data = $this->response->getJSON();

    if ($vehiculo->insert($data)){
      return $this->response->setJSON([
        "success"=> true,
        "message"=> "Vehiculo registrado correctamente"
      ]);
    }

    return $this->response->setJSON([
      "success"=> false,
      "message"=> "Error al registrar el vehiculo"
    ]);
  }

}

?>