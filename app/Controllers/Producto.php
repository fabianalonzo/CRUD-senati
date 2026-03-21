<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\ProductoModel;

class Producto extends BaseController
{

  /**
   * Este método retorna la vista con los datos de productos
   * @return string
   */
  public function index(): string
  {
    $producto = new ProductoModel();

    // $data es toda la información que enviaremos a la vista
    $data = [
      'header' => view('Partials/header'),
      'productos' => $producto->findAll(),
      'footer' => view('Partials/footer'),
    ];
    return view("Modulos/productos/index", $data);
  }

  /**
   * Retorna la vista para el registro de los productos
   * @return string
   */
  public function create(): string
  {
    $data = [
      'header' => view('Partials/header'),
      'footer' => view('Partials/footer'),
    ];

    return view('Modulos/productos/registrar', $data);
  }

  /**
   * Busca un registro de la tabla
   * @param int $id
   * @return string
   */
  public function buscar(int $id = null)
  {

    $producto = new ProductoModel();
    $registro = $producto->find($id); // [id, tipo, descripción, precio, stock]

    $data = [
      'header' => view('Partials/header'),
      'footer' => view('Partials/footer'),
      'registro' => $registro
    ];

    return view('Modulos/productos/actualizar', $data);
  }

  /**
   * Almacena los datos en la tabla Productos
   * @return \CodeIgniter\HTTP\RedirectResponse
   */
  public function registrarProducto()
  {
    $producto = new ProductoModel();

    // Se debe validar antes de insertar los datos
    $tipo = $this->request->getPost('tipo');
    $descripcion = $this->request->getPost('descripcion');
    $precio = $this->request->getPost('precio');
    $stock = $this->request->getPost('stock');

    $producto->insert([
      'tipo' => $tipo,
      'descripcion' => $descripcion,
      'precio' => $precio,
      'stock' => $stock,
    ]);

    return redirect()->to('/productos');
  }

  /**
   * Actualizar un registro de la tabla
   * @return \CodeIgniter\HTTP\RedirectResponse
   */
  public function actualizarProducto()
  {
    $producto = new ProductoModel();

    $producto->update(
      $this->request->getPost('idproducto'),
      [
        'tipo' => $this->request->getPost('tipo'),
        'descripcion' => $this->request->getPost('descripcion'),
        'precio' => $this->request->getPost('precio'),
        'stock' => $this->request->getPost('stock'),
      ]
    );

    return redirect()->to('/productos');
  }

  /**
   * Eliminar el registro de manera física de la tabla
   * @param int $id
   * @return \CodeIgniter\HTTP\RedirectResponse
   */
  public function eliminar(int $id = null)
  {
    $producto = new ProductoModel();
    $producto->delete($id);
    return redirect()->to('/productos');
  }
}
