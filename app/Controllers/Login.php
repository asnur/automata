<?php

namespace App\Controllers;

use App\Models\User;

class Login extends BaseController
{
    protected $user;

    public function __construct()
    {
        $this->user = new User();
    }

    public function index()
    {
        return view('pages/login/index');
    }

    public function cek_login()
    {
        $user = htmlspecialchars($this->request->getVar('username'));
        $pass = md5(htmlspecialchars($this->request->getVar('password')));
        $cek_baris = $this->user->where(['username' => $user, 'password' => $pass, 'izin' => 1])->countAllResults();
        $cek_data = $this->user->where(['username' => $user, 'password' => $pass])->find();
        if ($cek_baris) {
            if ($cek_data[0]['level'] == 'admin') {
                $_SESSION['admin'] = $cek_data;
                session()->setFlashdata('pesan', 'Anda Berhasil Login');
                return redirect()->to('/admin');
            } else {
                $_SESSION['user'] = $cek_data;
                session()->setFlashdata('pesan', 'Anda Berhasil Login');
                return redirect()->to('/home');
            }
        } else {
            session()->setFlashdata('pesan', 'Anda Gagal Login');
            return redirect()->to('/login');
        }
    }

    public function register()
    {
        $data = [
            'validation' => \Config\Services::validation()
        ];

        return view('pages/login/register', $data);
    }

    public function save_register()
    {
        if (!$this->validate([
            'nama' => [
                'rules' => 'required',
                'errors' => [
                    'requried' => '{field} Tidak Boleh Kosong'
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
                'rules' => 'uploaded[foto]|max_size[foto,1024]|is_image[foto]|mime_in[foto,image/jpg,image/jpeg,image/png]',
                'errors' => [
                    'uploaded' => '{field} Wajib di Upload',
                    'max_size' => 'Ukuran Melebihi 1MB',
                    'is_image' => 'File yang anda masukan bukan Gambar',
                    'mime_in' => 'File yang anda masukan bukan Gambar'
                ]
            ],
            'bukti' => [
                'rules' => 'uploaded[bukti]|max_size[bukti,1024]|is_image[bukti]|mime_in[bukti,image/jpg,image/jpeg,image/png]',
                'errors' => [
                    'uploaded' => '{field} Wajib di Upload',
                    'max_size' => 'Ukuran Melebihi 1MB',
                    'is_image' => 'File yang anda masukan bukan Gambar',
                    'mime_in' => 'File yang anda masukan bukan Gambar'
                ]
            ]
        ])) {
            return redirect()->to('/login/register')->withInput();
        }
        $nama = htmlspecialchars($this->request->getVar('nama'));
        $username = htmlspecialchars($this->request->getVar('username'));
        $email = htmlspecialchars($this->request->getVar('email'));
        $password = md5(htmlspecialchars($this->request->getVar('password')));
        $perusahaan = htmlspecialchars($this->request->getVar('perusahaan'));
        $alamat_perusahaan = htmlspecialchars($this->request->getVar('alamat_perusahaan'));
        $no_hp = htmlspecialchars($this->request->getVar('no_hp'));
        $foto = $this->request->getFile('foto');
        $namaFoto = $foto->getName();
        $foto->move('dist/img/user/');
        $bukti = $this->request->getFile('bukti');
        $namaBukti = $bukti->getName();
        $bukti->move('dist/img/bukti/');

        // dd($nama, $username, $password, $perusahaan, $alamat_perusahaan, $no_hp);


        $this->user->save([
            'nama' => $nama,
            'username' => $username,
            'password' => $password,
            'perusahaan' => $perusahaan,
            'email' => $email,
            'alamat' => $alamat_perusahaan,
            'no_hp' => $no_hp,
            'foto' => $namaFoto,
            'bukti' => $namaBukti,
            'level' => 'user',
            'izin' => 0

        ]);

        session()->setFlashdata('pesan', 'Anda Berhasil Register Silahkan Tunggu Konfirmasi dari Admin & Akan di Infokan Melalui Email yang tercantum');
        return redirect()->to('/');
    }

    public function logout()
    {
        session_destroy();
        return redirect()->to('/');
    }
}
