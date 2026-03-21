<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CrearTablaProductos extends Migration
{
    public function up()
    {
        $this->forge->addField([
            "id" => [
                "type"          => "INT",
                "constraint"    => 11,
                "unsigned"      => true,
                "auto_increment" => true
            ],
            "tipo" => [
                "type"          => "VARCHAR",
                "constraint"    => 30,
                "null"          => false
            ],
            "descripcion" => [
                "type"          => "VARCHAR",
                "constraint"    => 100,
                "null"          => false
            ],
            "precio" => [
                "type"          => "DECIMAL",
                "constraint"    => 7,2,
                "null"          => false
            ],
            "stock" => [
                "type"          => "SMALLINT",
                "null"          => false
            ]
        ]);

        //Clave primaria
        $this->forge->addPrimaryKey("id");

        //Crear la tabla
        $this->forge->createTable("Productos");
    }

    public function down()
    {
        $this->forge->dropTable("productos");    }
}
