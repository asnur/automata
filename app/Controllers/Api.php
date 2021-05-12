<?php

namespace App\Controllers;

use CodeIgniter\RESTful\ResourceController;

use App\Models\FotoBarang;

use App\Models\Pesanan;

header("Content-Type: application/json; charset=UTF-8");

class Api extends ResourceController
{
    protected $fotoBarang;
    protected $pesanan;

    public function __construct()
    {
        $this->fotoBarang = new FotoBarang();
        $this->pesanan = new Pesanan();
    }

    public function index($id_user = '', $id_pesanan = '')
    {
        return $this->respond($this->pesanan->detail_riwayat_pembelian($id_user, $id_pesanan), 200);
    }

    public function penyewaan($id_user = '', $id_pesanan = '')
    {
        return $this->respond($this->pesanan->detail_riwayat_penyewaan($id_user, $id_pesanan), 200);
    }
}
