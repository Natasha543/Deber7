<?php

namespace App\Controllers;

use CodeIgniter\RESTful\ResourceController;

/**
 * Controlador principal para manejar las solicitudes de las rutas definidas.
 */
class Home extends BaseController
{
    /**
     * Método para manejar solicitudes a la ruta `/categoria`.
     * Este método obtiene todos los registros de la tabla `categoria`.
     */
    public function categoria()
    {
        try {
            // Conectar a la base de datos utilizando la configuración predeterminada
            $db = \Config\Database::connect();

            // Ejecutar una consulta SQL para obtener todos los registros de la tabla `categoria`
            $query = $db->query("SELECT * FROM `categoria`;");

            // Obtener los resultados en un formato estándar (array de objetos)
            $resultado = $query->getResult();

            // Devolver los resultados en formato JSON con una respuesta HTTP exitosa (200)
            return $this->response->setJSON($resultado);
        } catch (\Exception $e) {
            // Si ocurre un error, devolver un mensaje de error con código HTTP 500 (Error interno del servidor)
            return $this->response->setStatusCode(500)->setJSON(['error' => $e->getMessage()]);
        }
    }
    
    //Insertar un Registro en categoria
    public function insertarCategoria($id_categoria, $name_categoria, $descripcion)
    {
        try {
            // Conectar a la base de datos
            $db = \Config\Database::connect();

            // Datos para insertar
            $data = [
                'id_categoria' => $id_categoria,
                'name_categoria' => $name_categoria,
                'descripcion' => $descripcion,
            ];

            // Insertar en la tabla `categoria`
            $query = $db->table('categoria')->insert($data);

            if ($query) {
                return $this->response->setJSON(['success' => 'Categoría insertada correctamente.']);
            } else {
                return $this->response->setStatusCode(500)->setJSON(['error' => 'No se pudo insertar la categoría.']);
            }
        } catch (\Exception $e) {
            return $this->response->setStatusCode(500)->setJSON(['error' => $e->getMessage()]);
        }
    }

    //Modificar un Registro en categoria
    public function modificarCategoria($id_categoria, $name_categoria, $descripcion)
    {
        try {
            // Conectar a la base de datos
            $db = \Config\Database::connect();

            // Datos para actualizar
            $data = [
                'id_categoria' => $id_categoria,
                'name_categoria' => $name_categoria,
                'descripcion' => $descripcion,
            ];

            // Actualizar el registro en la tabla `categoria`
            $query = $db->table('categoria')->update($data, ['id_categoria' => $id_categoria]);

            if ($query) {
                return $this->response->setJSON(['success' => 'Categoría modificada correctamente.']);
            } else {
                return $this->response->setStatusCode(500)->setJSON(['error' => 'No se pudo modificar la categoría.']);
            }
        } catch (\Exception $e) {
            return $this->response->setStatusCode(500)->setJSON(['error' => $e->getMessage()]);
        }
    }

    //Eliminar un Registro en categoria
    public function eliminarCategoria($id_categoria)
    {
        try {
            // Conectar a la base de datos
            $db = \Config\Database::connect();

            // Eliminar el registro de la tabla `categoria`
            $query = $db->table('categoria')->delete(['id_categoria' => $id_categoria]);

            if ($query) {
                return $this->response->setJSON(['success' => 'Categoría eliminada correctamente.']);
            } else {
                return $this->response->setStatusCode(500)->setJSON(['error' => 'No se pudo eliminar la categoría.']);
            }
        } catch (\Exception $e) {
            return $this->response->setStatusCode(500)->setJSON(['error' => $e->getMessage()]);
        }
    }


    /**
     * Método para manejar solicitudes a la ruta `/materiales`.
     * Este método obtiene todos los registros de la tabla `materiales`.
     */
    public function materiales()
    {
        try {
            // Conectar a la base de datos utilizando la configuración predeterminada
            $db = \Config\Database::connect();

            // Ejecutar una consulta SQL para obtener todos los registros de la tabla `materiales`
            $query = $db->query("SELECT * FROM `materiales`;");

            // Obtener los resultados en un formato estándar (array de objetos)
            $resultado = $query->getResult();

            // Devolver los resultados en formato JSON con una respuesta HTTP exitosa (200)
            return $this->response->setJSON($resultado);
        } catch (\Exception $e) {
            // Si ocurre un error, devolver un mensaje de error con código HTTP 500 (Error interno del servidor)
            return $this->response->setStatusCode(500)->setJSON(['error' => $e->getMessage()]);
        }
    }

    //Insertar un Registro en Materiales
    public function insertarMaterial($id_materiales, $nombre_material, $id_categoria, $stock)
    {
        try {
            // Conectar a la base de datos
            $db = \Config\Database::connect();

            // Datos para insertar
            $data = [
                'id_materiales' => $id_materiales,
                'nombre_material' => $nombre_material,
                'id_categoria' => $id_categoria,
                'stock' => $stock,
            ];

            // Insertar en la tabla `materiales`
            $query = $db->table('materiales')->insert($data);

            if ($query) {
                return $this->response->setJSON(['success' => 'Material insertado correctamente.']);
            } else {
                return $this->response->setStatusCode(500)->setJSON(['error' => 'No se pudo insertar el material.']);
            }
        } catch (\Exception $e) {
            return $this->response->setStatusCode(500)->setJSON(['error' => $e->getMessage()]);
        }
    }

    //Modificar un Registro en materiales
    public function modificarMaterial($id_materiales, $nombre_material, $id_categoria, $stock)
    {
        try {
            // Conectar a la base de datos
            $db = \Config\Database::connect();

            // Datos para actualizar
            $data = [
                'nombre_material' => $nombre_material,
                'id_categoria' => $id_categoria,
                'stock' => $stock,
            ];

            // Actualizar el registro en la tabla `materiales`
            $query = $db->table('materiales')->update($data, ['id_materiales' => $id_materiales]);

            if ($query) {
                return $this->response->setJSON(['success' => 'Material actualizado correctamente.']);
            } else {
                return $this->response->setStatusCode(500)->setJSON(['error' => 'No se pudo actualizar el material.']);
            }
        } catch (\Exception $e) {
            return $this->response->setStatusCode(500)->setJSON(['error' => $e->getMessage()]);
        }
    }

    //Eliminar un Registro en materiales
    public function eliminarMaterial($id_materiales)
    {
        try {
            // Conectar a la base de datos
            $db = \Config\Database::connect();

            // Eliminar el registro de la tabla `materiales`
            $query = $db->table('materiales')->delete(['id_materiales' => $id_materiales]);

            if ($query) {
                return $this->response->setJSON(['success' => 'Material eliminado correctamente.']);
            } else {
                return $this->response->setStatusCode(500)->setJSON(['error' => 'No se pudo eliminar el material.']);
            }
        } catch (\Exception $e) {
            return $this->response->setStatusCode(500)->setJSON(['error' => $e->getMessage()]);
        }
    }


}
