<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\ProveedorModel;

class Proveedor extends BaseController
{

  /**
   * Este método retorna la vista con los datos de proveedores
   * @return string
   */
  public function index(): string
  {
    $proveedor = new ProveedorModel();

    // $data es toda la información que enviaremos a la vista
    $data = [
      'header' => view('Partials/header'),
      'proveedores' => $proveedor->findAll(),
      'footer' => view('Partials/footer'),
    ];
    return view("Modulos/proveedores/index", $data);
  }

  /**
   * Retorna la vista para el registro de los proveedores
   * @return string
   */
  public function create(): string
  {
    $data = [
      'header' => view('Partials/header'),
      'footer' => view('Partials/footer'),
    ];

    return view('Modulos/proveedores/registrar', $data);
  }

  /**
   * Busca un registro de la tabla
   * @param int $id
   * @return string
   */
  public function buscar(int $id = null)
  {

    $proveedor = new ProveedorModel();
    $registro = $proveedor->find($id); // [id, razonsocial, direccion, ruc, telefono, representante]

    $data = [
      'header' => view('Partials/header'),
      'footer' => view('Partials/footer'),
      'registro' => $registro
    ];

    return view('Modulos/proveedores/actualizar', $data);
  }

  /**
   * Almacena los datos en la tabla Proveedores
   * @return \CodeIgniter\HTTP\RedirectResponse
   */
  public function registrarProveedor()
  {
    $proveedor = new ProveedorModel();

    // Se debe validar antes de insertar los datos
    $razonsocial = $this->request->getPost('razonsocial');
    $direccion = $this->request->getPost('direccion');
    $ruc = $this->request->getPost('ruc');
    $telefono = $this->request->getPost('telefono');
    $representante = $this->request->getPost('representante');

    $proveedor->insert([
      'razonsocial' => $razonsocial,
      'direccion' => $direccion,
      'ruc' => $ruc,
      'telefono' => $telefono,
      'representante' => $representante,
    ]);

    return redirect()->to('/proveedores');
  }

  /**
   * Actualizar un registro de la tabla
   * @return \CodeIgniter\HTTP\RedirectResponse
   */
  public function actualizarProveedor()
  {
    $proveedor = new ProveedorModel();

    $proveedor->update(
      $this->request->getPost('idproveedor'),
      [
        'razonsocial' => $this->request->getPost('razonsocial'),
        'direccion' => $this->request->getPost('direccion'),
        'ruc' => $this->request->getPost('ruc'),
        'telefono' => $this->request->getPost('telefono'),
        'representante' => $this->request->getPost('representante'),
      ]
    );

    return redirect()->to('/proveedores');
  }

  /**
   * Eliminar el registro de manera física de la tabla
   * @param int $id
   * @return \CodeIgniter\HTTP\RedirectResponse
   */
  public function eliminar(int $id = null)
  {
    $proveedor = new ProveedorModel();
    $proveedor->delete($id);
    return redirect()->to('/proveedores');
  }

}
