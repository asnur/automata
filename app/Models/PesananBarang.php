<?php

namespace App\Models;

use CodeIgniter\Model;

class PesananBarang extends Model
{
    protected $table = "pesanan_barang";
    protected $allowedFields = ['id_pesanan', 'id_barang', 'foto', 'harga_barang', 'jumlah_barang', 'subtotal', 'peminjaman', 'pengembalian', 'jumlah_hari'];
}
