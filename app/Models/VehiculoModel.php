<?php

namespace App\Models;

use CodeIgniter\Model;

class VehiculoModel extends Model
{
    protected $table = "vehiculos";
    protected $primaryKey = 'id';
    protected $returnType = 'array';
    protected $allowedFields = ['idmarca', 'modelo', 'anio', 'color', 'precio', 'created_at', 'updated_at'];

    // Campos de auditoría => ¿Cuándo se creó?, ¿Cuándo se modificó?
    protected $useTimestapms = true;
    protected $createdField = "created_at"; // Campo Tabla Vehículos
    protected $updatedField = "updated_at"; // Campo Tabla Vehículos

    // Métodos integrados:
    // findAll() => Obtener todos los registros | SELECT * FROM vehiculos
    // find() => Obtener un registro | SELECT * FROM vehiculos WHERE id = 1
    // insert() => Insertar un nuevo registro | INSERT INTO vehiculos (idmarca, modelo, anio, color, precio) VALUES (1, 'Corolla', 2020, 'Rojo', 20000)
    // delete() => Eliminar un registro | DELETE FROM vehiculos WHERE id = 1
    // update() => Actualizar un registro | UPDATE vehiculos SET modelo = 'Civic' WHERE id = 1

    // ¿Y qué sucede si necesito un método personalizado? Ejemplo: CONSULTA MULTITABLA
    // QUERY BUILDER => Constructor de consultas
    public function obtenerVehiculos()
    {
        return $this->select("vehiculos.*, marcas.marca")
            ->join("marcas", "marcas.id = vehiculos.idmarca")
            ->findAll();
    }

    // En caso la consulta sea muy compleja, podemos escribir nuestro SQL
    public function obtenerVehiculoSQL()
    {
        $sql = "
        SELECT 
        vehiculos.*, 
        marcas.marca 
        FROM vehiculos 
        INNER JOIN marcas ON marcas.id = vehiculos.idmarca
        ";
        return $this->db->query($sql)->getResultArray();
    }
}