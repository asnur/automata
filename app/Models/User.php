<?php

namespace App\Models;

use CodeIgniter\Model;

class User extends Model
{
    protected $table = "user";
    protected $allowedFields = ['nama', 'username', 'password', 'perusahaan', 'email', 'alamat', 'no_hp', 'foto', 'bukti', 'level', 'izin'];
}
