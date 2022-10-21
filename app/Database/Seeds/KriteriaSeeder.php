<?php

namespace App\Database\Seeds;

use App\Models\KriteriaModel;
use CodeIgniter\Database\Seeder;

class KriteriaSeeder extends Seeder {
    public function run() {
        $kriteriaModel = new KriteriaModel();

        $data = [
            'keterangan' => 'C1',
            'kriteria'  => 'Penghasilan Orang Tua',
            'bobot' => 5,
        ];

        $kriteriaModel->insert($data);
    }
}
