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

    public function logout()
    {
        session_destroy();
        return redirect()->to('/');
    }
}
