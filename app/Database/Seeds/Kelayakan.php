<?php

namespace App\Database\Seeds;

use App\Models\KelayakanModel;
use CodeIgniter\Database\Seeder;

class Kelayakan extends Seeder {
    public function run() {
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
                'jenis_bantuan' => 'bnpt',
                'nilai'         => 0,
                'keterangan'    => 1
            ],
            [
                'jenis_bantuan' => 'bnpt',
                'nilai'         => 0,
                'keterangan'    => 2
            ],
            [
                'jenis_bantuan' => 'bnpt',
                'nilai'         => 0,
                'keterangan'    => 3
            ],
        ];

        $kelayakanModel->insertBatch($dataLayak);
    }
}
