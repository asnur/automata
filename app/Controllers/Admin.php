<?php

namespace App\Controllers;

use App\Models\Pesanan;

use App\Models\PesananBarang;

use App\Models\User;

use App\Models\Barang;

use App\Models\FotoBarang;


class Admin extends BaseController
{
    protected $pesanan;
    protected $pesananBarang;
    protected $user;
    protected $barang;
    protected $fotoBarang;

    public function __construct()
    {
        $this->pesanan = new Pesanan();
        $this->user = new User();
        $this->barang = new Barang();
        $this->fotoBarang = new FotoBarang();
        $this->pesananBarang = new PesananBarang();
    }

    public function index()
    {
        if (!isset($_SESSION['admin'])) {
            return redirect()->to('/login');
        }
        $data = [
            'pemasukan_penjualan' => $this->pesanan->pemasukan_penjualan(),
            'pemasukan_penjualan_januari' => $this->pesanan->pemasukan_penjualan(1),
            'pemasukan_penjualan_febuari' => $this->pesanan->pemasukan_penjualan(2),
            'pemasukan_penjualan_maret' => $this->pesanan->pemasukan_penjualan(3),
            'pemasukan_penjualan_april' => $this->pesanan->pemasukan_penjualan(4),
            'pemasukan_penjualan_mei' => $this->pesanan->pemasukan_penjualan(5),
            'pemasukan_penjualan_juni' => $this->pesanan->pemasukan_penjualan(6),
            'pemasukan_penjualan_juli' => $this->pesanan->pemasukan_penjualan(7),
            'pemasukan_penjualan_agustus' => $this->pesanan->pemasukan_penjualan(8),
            'pemasukan_penjualan_september' => $this->pesanan->pemasukan_penjualan(9),
            'pemasukan_penjualan_oktober' => $this->pesanan->pemasukan_penjualan(10),
            'pemasukan_penjualan_november' => $this->pesanan->pemasukan_penjualan(11),
            'pemasukan_penjualan_desember' => $this->pesanan->pemasukan_penjualan(12),
            'pemasukan_penyewaan' => $this->pesanan->pemasukan_penyewaan(),
            'pemasukan_penyewaan_januari' => $this->pesanan->pemasukan_penyewaan(1),
            'pemasukan_penyewaan_febuari' => $this->pesanan->pemasukan_penyewaan(2),
            'pemasukan_penyewaan_maret' => $this->pesanan->pemasukan_penyewaan(3),
            'pemasukan_penyewaan_april' => $this->pesanan->pemasukan_penyewaan(4),
            'pemasukan_penyewaan_mei' => $this->pesanan->pemasukan_penyewaan(5),
            'pemasukan_penyewaan_juni' => $this->pesanan->pemasukan_penyewaan(6),
            'pemasukan_penyewaan_juli' => $this->pesanan->pemasukan_penyewaan(7),
            'pemasukan_penyewaan_agustus' => $this->pesanan->pemasukan_penyewaan(8),
            'pemasukan_penyewaan_september' => $this->pesanan->pemasukan_penyewaan(9),
            'pemasukan_penyewaan_oktober' => $this->pesanan->pemasukan_penyewaan(10),
            'pemasukan_penyewaan_november' => $this->pesanan->pemasukan_penyewaan(11),
            'pemasukan_penyewaan_desember' => $this->pesanan->pemasukan_penyewaan(12),
            'pelanggan' => $this->user->where(['izin' => 1])->countAllResults(),
            'pendaftar' => $this->user->where(['izin' => 0])->countAllResults()
        ];

        return view('pages/admin/index', $data);
    }

    public function pelanggan()
    {
        if (!isset($_SESSION['admin'])) {
            return redirect()->to('/login');
        }
        $data = [
            'pelanggan' => $this->user->where(['izin' => 1, 'level' => 'user'])->findAll()
        ];
        return view('pages/admin/pelanggan', $data);
    }

    public function tambah_pelanggan()
    {
        if (!isset($_SESSION['admin'])) {
            return redirect()->to('/login');
        }
        $data = [
            'validation' => \Config\Services::validation()
        ];
        return view('pages/admin/tambah/pelanggan', $data);
    }

    public function save_tambah_pelanggan()
    {
        if (!isset($_SESSION['admin'])) {
            return redirect()->to('/login');
        }
        if (!$this->validate([
            'nama' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Tidak Boleh Kosong'
                ]
            ],
            'username' => [
                'rules' => 'required|is_unique[user.username]',
                'errors' => [
                    'required' => '{field} Tidak Boleh Kosong',
                    'is_unique' => '{field} Sudah Digunakan'
                ]
            ],
            'password' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Tidak Boleh Kosong'
                ]
            ],
            'perusahaan' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Tidak Boleh Kosong'
                ]
            ],
            'email' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Tidak Boleh Kosong'
                ]
            ],
            'email' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Tidak Boleh Kosong'
                ]
            ],
            'alamat_perusahaan' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Tidak Boleh Kosong'
                ]
            ],
            'no_hp' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Tidak Boleh Kosong'
                ]
            ],
            'foto' => [
                'rules' => 'max_size[foto,1024]|is_image[foto]|mime_in[foto,image/jpg,image/jpeg,image/png]',
                'errors' => [
                    'max_size' => 'Ukuran Melebihi 1MB',
                    'is_image' => 'File yang anda masukan bukan Gambar',
                    'mime_in' => 'File yang anda masukan bukan Gambar'
                ]
            ]
        ])) {
            return redirect()->to('/admin/tambah_pelanggan')->withInput();
        }

        $nama = htmlspecialchars($this->request->getVar('nama'));
        $username = htmlspecialchars($this->request->getVar('username'));
        $email = htmlspecialchars($this->request->getVar('email'));
        $password = md5(htmlspecialchars($this->request->getVar('password')));
        $perusahaan = htmlspecialchars($this->request->getVar('perusahaan'));
        $alamat_perusahaan = htmlspecialchars($this->request->getVar('alamat_perusahaan'));
        $no_hp = htmlspecialchars($this->request->getVar('no_hp'));
        $foto = $this->request->getFile('foto');
        if ($foto->getError() == 4) {
            $namaFoto = '';
        } else {
            $namaFoto = $foto->getName();
            $foto->move('dist/img/user/');
        }


        $this->user->save([
            'nama' => $nama,
            'username' => $username,
            'password' => $password,
            'perusahaan' => $perusahaan,
            'email' => $email,
            'alamat' => $alamat_perusahaan,
            'no_hp' => $no_hp,
            'foto' => $namaFoto,
            'level' => 'user',
            'izin' => 1
        ]);

        session()->setFlashdata('pesan', 'Data Pelanggan Berhasil diTambahkan');
        return redirect()->to('/admin/pelanggan');
    }

    public function edit_pelanggan($id = '')
    {
        if (!isset($_SESSION['admin'])) {
            return redirect()->to('/login');
        }
        $data = [
            'pelanggan' => $this->user->find($id),
            'validation' => \Config\Services::validation()
        ];
        return view('pages/admin/edit/pelanggan', $data);
    }

    public function save_edit_pelanggan($id = '')
    {
        if (!isset($_SESSION['admin'])) {
            return redirect()->to('/login');
        }

        $dataUser = $this->user->find($id);

        if ($dataUser['username'] == $this->request->getVar('username')) {
            $rules = 'required';
        } else {
            $rules = 'required|is_unique[user.username]';
        }

        if (!$this->validate([
            'nama' => [
                'rules' => 'required',
                'errors' => [
                    'requried' => '{field} Tidak Boleh Kosong'
                ]
            ],
            'username' => [
                'rules' => $rules,
                'errors' => [
                    'required' => '{field} Tidak Boleh Kosong',
                    'is_unique' => '{field} Sudah Digunakan'
                ]
            ],
            'perusahaan' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Tidak Boleh Kosong'
                ]
            ],
            'email' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Tidak Boleh Kosong'
                ]
            ],
            'email' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Tidak Boleh Kosong'
                ]
            ],
            'alamat_perusahaan' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Tidak Boleh Kosong'
                ]
            ],
            'no_hp' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Tidak Boleh Kosong'
                ]
            ],
            'foto' => [
                'rules' => 'max_size[foto,1024]|is_image[foto]|mime_in[foto,image/jpg,image/jpeg,image/png]',
                'errors' => [
                    'max_size' => 'Ukuran Melebihi 1MB',
                    'is_image' => 'File yang anda masukan bukan Gambar',
                    'mime_in' => 'File yang anda masukan bukan Gambar'
                ]
            ]
        ])) {
            return redirect()->to('/admin/edit_pelanggan/' . $id)->withInput();
        }

        $nama = htmlspecialchars($this->request->getVar('nama'));
        $username = htmlspecialchars($this->request->getVar('username'));
        $email = htmlspecialchars($this->request->getVar('email'));
        $password = md5(htmlspecialchars($this->request->getVar('password')));
        $perusahaan = htmlspecialchars($this->request->getVar('perusahaan'));
        $alamat_perusahaan = htmlspecialchars($this->request->getVar('alamat_perusahaan'));
        $no_hp = htmlspecialchars($this->request->getVar('no_hp'));
        $foto = $this->request->getFile('foto');
        $namaFotoLama = $dataUser['foto'];
        if ($foto->getError() == 4) {
            $namaFoto = $namaFotoLama;
        } else {
            $namaFoto = $foto->getName();
            $foto->move('dist/img/user/');
            (empty($dataUser['foto']) ? '' : unlink('dist/img/user/' . $namaFotoLama));
        }


        $this->user->save([
            'id' => $id,
            'nama' => $nama,
            'username' => $username,
            'password' => $password,
            'perusahaan' => $perusahaan,
            'email' => $email,
            'alamat' => $alamat_perusahaan,
            'no_hp' => $no_hp,
            'foto' => $namaFoto,
            'level' => 'user',
            'izin' => 1
        ]);

        session()->setFlashdata('pesan', 'Data Pelanggan Berhasil diUbah');
        return redirect()->to('/admin/pelanggan');
    }

    public function hapus_pelanggan($id = '')
    {
        if (!isset($_SESSION['admin'])) {
            return redirect()->to('/login');
        }

        $this->user->delete($id);
        session()->setFlashdata('pesan', 'Data Pelanggan Berhasil diHapus');
        return redirect()->to('/admin/pelanggan');
    }

    public function pendaftaran()
    {
        if (!isset($_SESSION['admin'])) {
            return redirect()->to('/login');
        }
        $data = [
            'pendaftaran' => $this->user->where(['izin' => 0, 'level' => 'user'])->findAll()
        ];
        return view('pages/admin/pendaftaran', $data);
    }

    public function hapus_pendaftaran($id = '')
    {
        if (!isset($_SESSION['admin'])) {
            return redirect()->to('/login');
        }

        $this->user->delete($id);
        session()->setFlashdata('pesan', 'Data Pendaftaran Berhasil diHapus');
        return redirect()->to('/admin/pendaftaran');
    }

    public function verif_pendaftaran()
    {
        if (!isset($_SESSION['admin'])) {
            return redirect()->to('/login');
        }
        $id = $this->request->getVar('id');
        $this->user->save([
            'id' => $id,
            'izin' => 1
        ]);

        session()->setFlashdata('pesan', 'Verifikasi Pendaftaran Berhasil');
        return redirect()->to('/admin/pelanggan');
    }

    public function barang()
    {
        if (!isset($_SESSION['admin'])) {
            return redirect()->to('/login');
        }
        $data = [
            'barang_jual' => $this->barang->where(['kategori' => 'jual'])->findAll(),
            'barang_sewa' => $this->barang->where(['kategori' => 'sewa'])->findAll()
        ];

        return view('pages/admin/barang', $data);
    }

    public function tambah_barang()
    {
        if (!isset($_SESSION['admin'])) {
            return redirect()->to('/login');
        }
        $data = [
            'validation' => \Config\Services::validation()
        ];

        return view('pages/admin/tambah/barang', $data);
    }

    public function save_tambah_barang()
    {
        if (!isset($_SESSION['admin'])) {
            return redirect()->to('/login');
        }
        if (!$this->validate([
            'nama' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Tidak Boleh Kosong'
                ]
            ],
            'kategori' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Tidak Boleh Kosong'
                ]
            ],
            'harga' => [
                'rules' => 'required|numeric',
                'errors' => [
                    'required' => '{field} Tidak Boleh Kosong',
                    'numeric' => '{field} Harus Angka'
                ]
            ],
            'stok' => [
                'rules' => 'required|numeric',
                'errors' => [
                    'required' => '{field} Tidak Boleh Kosong',
                    'numeric' => '{field} Harus Angka'
                ]
            ],
            'foto' => [
                'rules' => 'max_size[foto,1024]|is_image[foto]|mime_in[foto,image/jpg,image/jpeg,image/png]',
                'errors' => [
                    'max_size' => 'Ukuran Melebihi 1MB',
                    'is_image' => 'File yang anda masukan bukan Gambar',
                    'mime_in' => 'File yang anda masukan bukan Gambar'
                ]
            ],
            'fotos' => [
                'rules' => 'max_size[fotos,1024]|is_image[fotos]|mime_in[fotos,image/jpg,image/jpeg,image/png]',
                'errors' => [
                    'max_size' => 'Ukuran Melebihi 1MB',
                    'is_image' => 'File yang anda masukan bukan Gambar',
                    'mime_in' => 'File yang anda masukan bukan Gambar'
                ]
            ]
        ])) {
            return redirect()->to('/admin/tambah_barang')->withInput();
        }

        $nama = htmlspecialchars($this->request->getVar('nama'));
        $harga = htmlspecialchars($this->request->getVar('harga'));
        $stok = htmlspecialchars($this->request->getVar('stok'));
        $kategori = htmlspecialchars($this->request->getVar('kategori'));
        $foto = $this->request->getFile('foto');
        $namaFoto = $foto->getName();
        $foto->move('assets/images/item/');
        $fotos = $this->request->getFileMultiple('fotos');
        $deskripsi = $this->request->getVar('deskripsi');
        // dd($nama, $harga, $stok, $foto, $fotos, $deskripsi);

        $this->barang->save([
            'nama_barang' => $nama,
            'harga' => $harga,
            'stok' => $stok,
            'foto' => $namaFoto,
            'deskripsi' => $deskripsi,
            'kategori' => $kategori
        ]);

        foreach ($fotos as $f) {
            $f->move('assets/images/item/');
            $this->fotoBarang->save([
                'id_barang' => $this->barang->getInsertID(),
                'nama_foto' => $f->getName()
            ]);
        }

        session()->setFlashdata('pesan', 'Data Barang Berhasil diTambahkan');
        return redirect()->to('/admin/barang');
    }

    public function edit_barang($id = '')
    {
        if (!isset($_SESSION['admin'])) {
            return redirect()->to('/login');
        }
        $data = [
            'barang' => $this->barang->find($id),
            'gallery_barang' => $this->fotoBarang->where(['id_barang' => $id])->findAll(),
            'validation' => \Config\Services::validation()
        ];

        return view('pages/admin/edit/barang', $data);
    }

    public function save_edit_barang($id = '')
    {
        if (!isset($_SESSION['admin'])) {
            return redirect()->to('/login');
        }
        if (!$this->validate([
            'nama' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Tidak Boleh Kosong'
                ]
            ],
            'kategori' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Tidak Boleh Kosong'
                ]
            ],
            'harga' => [
                'rules' => 'required|numeric',
                'errors' => [
                    'required' => '{field} Tidak Boleh Kosong',
                    'numeric' => '{field} Harus Angka'
                ]
            ],
            'stok' => [
                'rules' => 'required|numeric',
                'errors' => [
                    'required' => '{field} Tidak Boleh Kosong',
                    'numeric' => '{field} Harus Angka'
                ]
            ],
            'foto' => [
                'rules' => 'max_size[foto,1024]|is_image[foto]|mime_in[foto,image/jpg,image/jpeg,image/png]',
                'errors' => [
                    'max_size' => 'Ukuran Melebihi 1MB',
                    'is_image' => 'File yang anda masukan bukan Gambar',
                    'mime_in' => 'File yang anda masukan bukan Gambar'
                ]
            ],
            'fotos' => [
                'rules' => 'max_size[fotos,1024]|is_image[fotos]|mime_in[fotos,image/jpg,image/jpeg,image/png]',
                'errors' => [
                    'max_size' => 'Ukuran Melebihi 1MB',
                    'is_image' => 'File yang anda masukan bukan Gambar',
                    'mime_in' => 'File yang anda masukan bukan Gambar'
                ]
            ]
        ])) {
            return redirect()->to('/admin/edit_barang/' . $id)->withInput();
        }

        $nama = htmlspecialchars($this->request->getVar('nama'));
        $harga = htmlspecialchars($this->request->getVar('harga'));
        $stok = htmlspecialchars($this->request->getVar('stok'));
        $kategori = htmlspecialchars($this->request->getVar('kategori'));
        $foto = $this->request->getFile('foto');
        $fotos = $this->request->getFileMultiple('fotos');
        $deskripsi = $this->request->getVar('deskripsi');
        // dd($nama, $harga, $stok, $kategori, $foto, $fotos, $deskripsi);
        $dataFoto = $this->barang->find($id);

        if ($foto->getError() == 4) {
            $namaFotoBarang = $dataFoto['foto'];
        } else {
            $namaFotoBarang = $foto->getName();
            $foto->move('assets/images/item/');
            unlink('assets/images/item/' . $dataFoto['foto']);
        }

        $this->barang->save([
            'id' => $id,
            'nama_barang' => $nama,
            'harga' => $harga,
            'stok' => $stok,
            'foto' => $namaFotoBarang,
            'deskripsi' => $deskripsi,
            'kategori' => $kategori
        ]);

        foreach ($fotos as $f) {
            if (!$f->getError() == 4) {
                $f->move('assets/images/item/');
                $this->fotoBarang->save([
                    'id_barang' => $id,
                    'nama_foto' => $f->getName()
                ]);
            }
        }


        session()->setFlashdata('pesan', 'Data Barang Berhasil diUbah');
        return redirect()->to('/admin/barang');
    }

    public function hapus_foto($id = '')
    {
        if (!isset($_SESSION['admin'])) {
            return redirect()->to('/login');
        }
        $dataFoto = $this->fotoBarang->where(['id_foto' => $id])->first();
        // dd($dataFoto);
        unlink('assets/images/item/' . $dataFoto['nama_foto']);
        $this->fotoBarang->where(['id_foto' => $id])->delete();
        return redirect()->to('/admin/edit_barang/' . $dataFoto['id_barang']);
    }

    public function hapus_barang($id = '')
    {
        if (!isset($_SESSION['admin'])) {
            return redirect()->to('/login');
        }
        $dataFoto = $this->barang->find($id);
        unlink('assets/images/item/' . $dataFoto['foto']);
        $this->barang->delete($id);
        $dataFotos = $this->fotoBarang->where(['id_barang' => $id])->findAll();
        foreach ($dataFotos as $df) {
            unlink('assets/images/item/' . $df['nama_foto']);
        }
        $this->fotoBarang->where(['id_barang' => $id])->delete();
        session()->setFlashdata('pesan', 'Data Barang Berhasil diHapus');
        return redirect()->to('/admin/barang');
    }

    public function penjualan()
    {
        if (!isset($_SESSION['admin'])) {
            return redirect()->to('/login');
        }

        $data = [
            'riwayat_pembelian' => $this->pesanan->riwayat_pembelian_admin()
        ];

        return view('pages/admin/penjualan', $data);
    }

    public function hapus_penjualan($id = '')
    {
        if (!isset($_SESSION['admin'])) {
            return redirect()->to('/login');
        }
        $this->pesanan->delete($id);
        $this->pesananBarang->where(['id_pesanan' => $id])->delete();
        session()->setFlashdata('pesan', 'Data Penjualan Berhasil diHapus');
        return redirect()->to('/admin/penjualan');
    }
}
