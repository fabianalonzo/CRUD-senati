<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class ProductosXSeeder extends Seeder
{
    public function run()
    {
        $data = [
            [
                "tipo" => "Electrónico",
                "descripcion" => "Audífonos inalámbricos con cancelación de ruido",
                "precio" => 199.99,
                "stock" => 50
            ],
            [
                "tipo" => "Hogar",
                "descripcion" => "Licuadora de 1.5L con 5 velocidades",
                "precio" => 89.90,
                "stock" => 30
            ],
            [
                "tipo" => "Ropa",
                "descripcion" => "Camiseta de algodón unisex color negro",
                "precio" => 25.50,
                "stock" => 100
            ]
        ]; //fin $data

        $this->db->table("productosX")->insertBatch($data);
    }
}
