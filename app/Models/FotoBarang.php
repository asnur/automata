<?php

namespace App\Models;

use CodeIgniter\Model;

class FotoBarang extends Model
{
    protected $table = "foto_barang";
    protected $allowedFields = ['id_barang', 'nama_foto'];
}
