<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class ProductosSeeder extends Seeder
{
    public function run()
    {
        $data = [
            [
                "tipo" => "Electrónico",
                "descripcion"   => "laptop lenovo",
                "precio"       => 2599.90,
                "stock"  => 20
            ],
            [
                "tipo" => "Domestico",
                "descripcion"   => "Sofa",
                "precio"       => 489.90,
                "stock"  => 15
            ],
            [
                "tipo" => "Vestimenta",
                "descripcion"   => "Terno y camisa",
                "precio"       => 65.50,
                "stock"  => 65
            ]
        ]; //fin $data

        $this->db->table("productos")->insertBatch($data);
    }
}
