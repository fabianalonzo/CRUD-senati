<?php

namespace App\Models;
use CodeIgniter\Model;

class ProductoXModel extends Model
{
    protected $table = "productosX";
    protected $primaryKey = "id";
    protected $returnType = 'array';
    protected $allowedFields = ["tipo", "descripcion", "precio", "stock"];

    public function getProductoX()
    {
        return $this->findAll();
    }
}