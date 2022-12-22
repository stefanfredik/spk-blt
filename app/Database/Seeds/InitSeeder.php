<?php

namespace App\Database\Seeds;

use App\Models\KelayakanModel;
use App\Models\MyUserModel;
use CodeIgniter\Database\Seeder;
use \Myth\Auth\Password;

class InitSeeder extends Seeder {
    public function run() {

        $group = [
            [
                "name" => "Admin",
                "description" => "Admin Groups",
            ],
            [
                "name" => "Pendamping BLT",
                "description" => "Pendamping BLT",
            ],
            [
                "name" => "Pendamping BPNT",
                "description" => "Pendamping BPNT",
            ],
            [
                "name" => "Kepala Desa",
                "description" => "Kepala Desa",
            ]
        ];

        $this->db->table('auth_groups')->insertBatch($group);

        $user = [
            'nama_user' => 'Admin',
            'username' => 'admin',
            'password_hash' => Password::hash("12345678"),
            'active'    => "1"
        ];

        $userModel = new MyUserModel();
        $userModel->withGroup("Admin")->save($user);

        $kelayakanModel = new KelayakanModel();

        $dataLayak = [
            [
                'jenis_bantuan' => 'blt',
                'nilai'         => 0,
                'keterangan'    => 1
            ],
            [
                'jenis_bantuan' => 'blt',
                'nilai'         => 0,
                'keterangan'    => 2
            ],
            [
                'jenis_bantuan' => 'blt',
                'nilai'         => 0,
                'keterangan'    => 3
            ],
            [
                'jenis_bantuan' => 'bpnt',
                'nilai'         => 0,
                'keterangan'    => 1
            ],
            [
                'jenis_bantuan' => 'bpnt',
                'nilai'         => 0,
                'keterangan'    => 2
            ],
            [
                'jenis_bantuan' => 'bpnt',
                'nilai'         => 0,
                'keterangan'    => 3
            ],
        ];

        $kelayakanModel->insertBatch($dataLayak);
    }
}
