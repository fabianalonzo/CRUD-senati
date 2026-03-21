<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */


//El slash "/" representa el HOME de tu aplicación
//es decir www.miweb.com/programador

$routes->get('/', 'Home::dashboard');
$routes->get('/senati', 'Home::index'); //Primer ejemplo de navegación

//¿Cómo funciona una ruta?
//$routes->verbo('/ruta/', 'Controlador::MetodoAccion');
//Nota: Es posible crear más de una ruta para una vista

$routes->get('/programador', 'Carrera::showIngenieria');
$routes->get('/coder', 'Carrera::showIngenieria');

$routes->get('/creativo', 'Carrera::showDesign');
$routes->get('/marketing', 'Carrera::showDesign');

//Nuevas rutas para navegar desde DASHBOARD
$routes->get('/clientes', 'Cliente::index'); // http://localhost:8080/clientes // Muestra la tabla con datos
$routes->get('/clientes/registrar', 'Cliente::create'); // http://localhost:8080/clientes/registrar // Muestra solo el formulario
$routes->post('/clientes/guardar', 'Cliente::registrarCliente'); // Envía los datos del form a la tabla
$routes->post('/clientes/actualizar', 'Cliente::actualizarCliente'); // Actualiza los datos del form a la tabla
$routes->get('/clientes/eliminar/(:num)', 'Cliente::eliminar/$1'); // Eliminar un cliente
$routes->get('/clientes/buscar/(:num)', 'Cliente::buscar/$1'); // Antes de actualizar tenemos que buscar    

$routes->get('/proveedores', 'Proveedor::index');
$routes->get('/proveedores/registrar', 'Proveedor::create'); // http://localhost:8080/proveedores/registrar // Muestra solo el formulario
$routes->post('/proveedores/guardar', 'Proveedor::registrarProveedor'); // Envía los datos del form a la tabla
$routes->post('/proveedores/actualizar', 'Proveedor::actualizarProveedor'); // Actualiza los datos del form a la tabla
$routes->get('/proveedores/eliminar/(:num)', 'Proveedor::eliminar/$1'); // Eliminar un proveedor
$routes->get('/proveedores/buscar/(:num)', 'Proveedor::buscar/$1'); // Antes de actualizar tenemos que buscar

$routes->get('/productos', 'Producto::index');
$routes->get('/productos/registrar', 'Producto::create'); // http://localhost:8080/productos/registrar // Muestra solo el formulario
$routes->post('/productos/guardar', 'Producto::registrarProducto'); // Envía los datos del form a la tabla
$routes->post('/productos/actualizar', 'Producto::actualizarProducto'); // Actualiza los datos del form a la tabla
$routes->get('/productos/eliminar/(:num)', 'Producto::eliminar/$1'); // Eliminar un producto
$routes->get('/productos/buscar/(:num)', 'Producto::buscar/$1'); // Antes de actualizar tenemos que buscar