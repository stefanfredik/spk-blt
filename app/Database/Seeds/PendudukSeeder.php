<?php

namespace App\Database\Seeds;

use App\Models\PendudukModel;
use CodeIgniter\Database\Seeder;

class PendudukSeeder extends Seeder
{
    public function run()
    {
        $faker = \Faker\Factory::create('id_ID');

        $data = [
            'id_user' => 1,
            'nik'   => '1234567890',
            'no_kk' => '9876543321',
            'nama_lengkap' => $faker->name,
            'tempat_lahir' => $faker->city,
            'tanggal_lahir' => '2022-10-10',
            'jenis_kelamin' => 'Perempuan',
            'alamat'    => $faker->address,
            'rt' => '01',
            'rw' => '02',
            'desa' => 'Poco Ranaka',
            'status' => 'Tidak ada'
        ];

        $pendudukModel = new PendudukModel();
        $pendudukModel->insert($data);
    }
}
