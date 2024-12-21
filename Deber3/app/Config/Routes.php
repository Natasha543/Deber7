<?php

namespace Config;

use CodeIgniter\Config\BaseConfig;
use CodeIgniter\Router\RouteCollection;

// Crear una instancia del servicio de rutas
$routes = Services::routes();

/*
 * @var RouteCollection $routes
 * Esta variable contiene la colección de rutas registradas en la aplicación.
 */

// Cargar las rutas por defecto del sistema
if (file_exists(SYSTEMPATH . 'Config/Routes.php')) {
    require SYSTEMPATH . 'Config/Routes.php';
}

/**
 * Definir rutas personalizadas.
 * Estas rutas especifican qué controlador y método manejarán las solicitudes
 * realizadas a las rutas definidas.
 */

// Ruta para la categoría de categotria
// Cuando un usuario acceda a "/categotria", se llamará al método "categoria" del controlador "Home".
$routes->get('/categoria', 'Home::categoria');

//Insertar un Registro en categoria
$routes->get('/categoria/insertarCategoria/(:num)/(:any)/(:any)', 'Home::insertarCategoria/$1/$2/$3');

//Modificar un Registro en categoria
$routes->get('/categoria/modificarCategoria/(:num)/(:any)/(:any)', 'Home::modificarCategoria/$1/$2/$3');

//Eliminar un Registro en categoria
$routes->get('/categoria/eliminarCategoria/(:num)', 'Home::eliminarCategoria/$1');


// Ruta para la materiales de materiales
// Cuando un usuario acceda a "/materiales", se llamará al método "materiales" del controlador "Home".
$routes->get('/materiales', 'Home::materiales');

//Insertar un Registro en materiales
$routes->get('/materiales/insertarMaterial/(:num)/(:any)/(:num)/(:num)', 'Home::insertarMaterial/$1/$2/$3/$4');

//Modificar un Registro en materiales
$routes->get('/materiales/modificarMaterial/(:num)/(:any)/(:num)/(:num)', 'Home::modificarMaterial/$1/$2/$3/$4');

//Eliminar un Registro en materiales
$routes->get('/materiales/eliminarMaterial/(:num)', 'Home::eliminarMaterial/$1');

/**
 * Cargar rutas adicionales dependiendo del entorno actual.
 * Si existe un archivo de rutas específico para el entorno (por ejemplo, `development`),
 * se incluirá aquí.
 */
if (is_file(APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php')) {
    require APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php';
}
