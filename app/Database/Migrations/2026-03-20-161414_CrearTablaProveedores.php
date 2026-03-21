<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CrearTablaProveedores extends Migration
{
    public function up()
    {
        $this->forge->addField([
            "id" => [
                "type" => "INT",
                "constraint" => 11,
                "usigned" => true,
                "auto_increment" => true,
            ],
            "razonsocial" => [
                "type" => "VARCHAR",
                "constraint" => 150,
                "null" => false,
            ],
            "direccion" => [
                "type" => "VARCHAR",
                "constraint" => 150,
                "null" => false,
            ],
            "ruc" => [
                "type" => "CHAR",
                "constraint" => 11,
                "null" => false,
            ],
            "telefono" => [
                "type" => "CHAR",
                "constraint" => 150,
                "null" => false,
            ],
            "representante" => [
                "type" => "VARCHAR",
                "constraint" => 50,
                "null" => false,
            ],
        ]);

        //Clave primaria
        $this->forge->addPrimaryKey("id");

        //Razonsocial debe ser único
        $this->forge->addUniqueKey("razonsocial");

        //Razonsocial debe ser único
        $this->forge->addUniqueKey("ruc");

        //Crear la tabla
        $this->forge->createTable("proveedores");
    }

    public function down()
    {
        $this->forge->dropTable("proveedores");
    }
}
