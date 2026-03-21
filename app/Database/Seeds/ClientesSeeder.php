<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class ClientesSeeder extends Seeder
{
    public function run()
    {
        $data = [
            [
                "apellidos" => "Salas Vasquez",
                "nombres"   => "Fabian",
                "dni"       => "74064842",
                "telefono"  => "936255244"
            ],
            [
                "apellidos" => "Apolaya Mendoza",
                "nombres"   => "David",
                "dni"       => "78854522",
                "telefono"  => "955240111"
            ],
            [
                "apellidos" => "Palacios Gonzales",
                "nombres"   => "Leonardo",
                "dni"       => "74558211",
                "telefono"  => "988541254"
            ]
        ]; //fin $data

        $this->db->table("clientes")->insertBatch($data);
    }
}
