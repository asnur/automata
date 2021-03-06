<?php

namespace App\Models;

use CodeIgniter\Model;

class Pesanan extends Model
{
    protected $table = "pesanan";
    protected $allowedFields = ['id_user', 'sales', 'total', 'kategori', 'status'];
    protected $db;

    public function __construct()
    {
        $this->db = \Config\Database::connect();
    }

    public function insert_data($id_pesanan = '', $id_user = '', $sales = '', $total = '', $kategori = '', $status = '')
    {
        return $this->db->query("INSERT INTO pesanan (`id`, `id_user`, `sales`, `total`, `kategori`, `status`) VALUES ('$id_pesanan', '$id_user', '$sales', '$total', '$kategori', '$status')");
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

    public function riwayat_pembelian_admin()
    {
        return $this->db->table('user')->join('pesanan', 'pesanan.id_user=user.id')->where(['pesanan.kategori' => 'jual'])->get()->getResultArray();
    }

    public function riwayat_penyewaan_admin()
    {
        return $this->db->table('user')->join('pesanan', 'pesanan.id_user=user.id')->where(['pesanan.kategori' => 'sewa'])->get()->getResultArray();
    }

    //Pemasukan Penjualan

    public function pemasukan_penjualan($month = '')
    {
        $year = date('Y');
        if ($month == '') {
            $monthNow = date('m');
            return $this->db->query("SELECT SUM(total) AS total FROM pesanan WHERE YEAR(waktu) = $year AND MONTH(waktu) = $monthNow AND kategori = 'jual'")->getResultArray();
        } else {
            return $this->db->query("SELECT SUM(total) AS total FROM pesanan WHERE YEAR(waktu) = $year AND MONTH(waktu) = $month AND kategori = 'jual'")->getResultArray();
        }
    }

    public function pemasukan_penyewaan($month = '')
    {
        $year = date('Y');
        if ($month == '') {
            $monthNow = date('m');
            return $this->db->query("SELECT SUM(total) AS total FROM pesanan WHERE YEAR(waktu) = $year AND MONTH(waktu) = $monthNow AND kategori = 'sewa'")->getResultArray();
        } else {
            return $this->db->query("SELECT SUM(total) AS total FROM pesanan WHERE YEAR(waktu) = $year AND MONTH(waktu) = $month AND kategori = 'sewa'")->getResultArray();
        }
    }
}
