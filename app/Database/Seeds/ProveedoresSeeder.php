<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class ProveedoresSeeder extends Seeder
{
    public function run()
    {
        $data = [
            [
                "razonsocial" => "Systematic",
                "direccion" => "Calle Lima 219",
                "ruc" => "20325158652",
                "telefono" => "925478475",
                "representante" => "Takeshi Hamano",
            ],
            [
                "razonsocial" => "Compuservic",
                "direccion" => "Pueblo nuevo",
                "ruc" => "10522548878",
                "telefono" => "903512475",
                "representante" => "Luyo Casani",
            ],
        ];

        $this->db->table("proveedores")->insertBatch($data);
    }
}
