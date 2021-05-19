<?php

namespace App\Models;

use CodeIgniter\Model;

class Barang extends Model
{
    protected $table = "barang";
    protected $allowedFields = ['nama_barang', 'harga', 'stok', 'foto', 'deskripsi', 'kategori'];
}
