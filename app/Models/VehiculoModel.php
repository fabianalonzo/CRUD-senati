<?php

namespace App\Models;
use CodeIgniter\Model;

class VehiculoModel extends Model{

  protected $table = "vehiculos";
  protected $primaryKey = "id";
  protected $returnType = "array";
  protected $allowedFields = ["idMarca", "modelo", "anio", "color", "precio"];

  //Campos de auditoria => ¿Cuándo se creo?, ¿Cuándo se modificó?
  protected $useTimestamps = true;
  protected $createdField = "create_at"; //Campo tabla vehiculos
  protected $updatedField = "update_at"; //Campo tabla vehiculos

  //Métodos integrados:
  //findAll():    Obtener todos los registros
  //find():       Obtener un registro
  //insert()      Agregar un nuevo registro
  //delete():     Eliminacion física dr un registro
  //update():     Actualización

  //¿?Y que suscede si necesito un metodo personalizado? Ejemplo: Consulta Multitabla
  public function ObtenerVehiculos(){
    return $this->select("vehiculos.*, marcas.marca")
    ->join("marcas", "marcas.id = vehiculos.idmarca")
    ->findAll();
  }

  //En caso la coinsulta sea muy compleja, podemos escribir nuestro propio SQL
  public function obtenerVehiculoSQL(){
    $sql = "
    SELECT
      vehiculos.*,
      marcas.marca
      FROM vehiculos
      INNER JOIN  marcas ON marcas.id = vehiculos.idmarca
    ";
    return $this->db->query($sql)->getResultArray();
  }

}