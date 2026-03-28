<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\ProductoXModel;

class ProductoX extends BaseController
{
    // Retorna la vista para administrar vehículos
    public function index()
    {
        // Los datos se pueden enviar a la vista utilizando un ARREGLO
        $data = [
            'header' => view('Partials/header'),
            'footer' => view('Partials/footer'),
        ];

        return view("Modulos/productosX/index", $data);
    }

    public function getProductoX()
    {
        // Se require del modelo
        $productoX = new ProductoXModel();
        return $this->response->setJSON($productoX->getProductoX());
    }

    public function registrarProductoX()
    {
        $productoX = new ProductoXModel();

        // Todos los campos requeridos, deberán ser enviados en un JSON
        // REQUEST = SOLICITUD
        // RESPONSE = RESPUESTA
        $data = $this->request->getJSON();
        // return $this->response->setJSON($data); // Depuración

        if ($productoX->insert($data)) {
            return $this->response->setJSON([
                "success" => true,
                "message" => "Registrado correctamente"
            ]);
        }

        return $this->response->setJSON([
            "success" => false,
            "message" => "Error al registrar"
        ]);
    }

}