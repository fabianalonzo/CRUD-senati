<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class ProveedoresSeeder extends Seeder
{
    public function run()
    {
        $data = [
            [
                "razonsocial" => "Inversiones Andinas del Pacífico S.A.C.",
                "direccion" => "Av. Falsa 123",
                "ruc" => "41325478652",
                "telefono" => "945124345",
                "representante" => "Pachas Magallanes Paul",
            ],
            [
                "razonsocial" => "Servicios Logísticos Inti Raymi S.R.L.",
                "direccion" => "Av. Verdadera 987",
                "ruc" => "22134579615",
                "telefono" => "903512475",
                "representante" => "Lopez Llanos Pepe",
            ],
        ];

        $this->db->table("proveedores")->insertBatch($data);
    }
}
