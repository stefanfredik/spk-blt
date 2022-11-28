<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\PendudukModel;

class Laporan extends BaseController {

    private $url = 'penduduk';
    private $title = 'Data Laporan Penduduk';

    public function __construct() {
        $this->pendudukModel = new PendudukModel();
    }

    public function getPenduduk() {
        $data = [
            'title' => 'Laporan Bantuan Penduduk',
            'dataPenduduk' => $this->pendudukModel->findAll(),
            'url' => $this->url
        ];
        return view('laporan/datapenduduk', $data);
    }
}
