<?php

namespace App\Models;

use CodeIgniter\Model;

class Pesanan extends Model
{
    protected $table = "pesanan";
    protected $allowedFields = ['id_user', 'total', 'kategori', 'status'];
    protected $db;

    public function __construct()
    {
        $this->db = \Config\Database::connect();
    }

    public function insert_data($id_pesanan = '', $id_user = '', $total = '', $kategori = '', $status = '')
    {
        return $this->db->query("INSERT INTO pesanan (`id`, `id_user`, `total`, `kategori`, `status`) VALUES ('$id_pesanan', '$id_user', '$total', '$kategori', '$status')");
    }

    public function riwayat_pembelian($id_user)
    {
        return $this->db->table('user')->join('pesanan', 'pesanan.id_user=user.id')->where(['user.id' => $id_user, 'pesanan.kategori' => 'jual'])->get()->getResultArray();
    }

    public function riwayat_sewa($id_user)
    {
        return $this->db->table('user')->join('pesanan', 'pesanan.id_user=user.id')->where(['user.id' => $id_user, 'pesanan.kategori' => 'sewa'])->get()->getResultArray();
    }

    public function detail_riwayat_pembelian($id_user, $id_pesanan)
    {
        return $this->db->table('pesanan')->join('pesanan_barang', 'pesanan.id=pesanan_barang.id_pesanan')->join('user', 'pesanan.id_user=user.id')->where(['user.id' => $id_user, 'pesanan.kategori' => 'jual', 'pesanan.id' => $id_pesanan])->join('barang', 'pesanan_barang.id_barang=barang.id')->get()->getResultArray();
    }

    public function detail_riwayat_penyewaan($id_user, $id_pesanan)
    {
        return $this->db->table('pesanan')->join('pesanan_barang', 'pesanan.id=pesanan_barang.id_pesanan')->join('user', 'pesanan.id_user=user.id')->where(['user.id' => $id_user, 'pesanan.kategori' => 'sewa', 'pesanan.id' => $id_pesanan])->join('barang', 'pesanan_barang.id_barang=barang.id')->get()->getResultArray();
    }
}
