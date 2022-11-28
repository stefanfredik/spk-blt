<?php

namespace App\Database\Seeds;

use App\Models\UserModel;
use CodeIgniter\Database\Seeder;

class UserSeeder extends Seeder {
    public function run() {
        $data = [
            'username'  => 'admin',
            'nama_user' => 'Fania',
            'jabatan' => 'admin',
            'password' => password_hash('12345678', PASSWORD_DEFAULT)
        ];

        $userModel = new UserModel();
        $userModel->insert($data);
    }
}
