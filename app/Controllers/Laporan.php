<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\PendudukModel;
use Dompdf\Dompdf;

class Laporan extends BaseController {

    private $url = 'laporan';
    private $title = 'Data Laporan Penduduk';

    public function __construct() {
        $this->pendudukModel = new PendudukModel();
    }

    public function getIndex() {
        $data = [
            'title' => 'Laporan Bantuan Penduduk',
            'url' => $this->url
        ];
        return view('laporan/index', $data);
    }

    public function getTable() {
        $data = [
            'title' => 'Data Laporan Penduduk',
            'dataPenduduk' => $this->pendudukModel->findAll(),
            'url' => $this->url
        ];
        return view('laporan/datapenduduk', $data);
    }

    private function cetakPenduduk() {
        $data = [
            'title' => 'Laporan',
            'dataPeserta' => $this->bltModel->findAllDataBlt(),
            'dataKriteria' => $this->kriteriaModel->where('jenis_bantuan', $this->jenisBantuan)->findAll(),
            'dataSubkriteria' => $this->subkriteriaModel->where('jenis_bantuan', $this->jenisBantuan)->findAll(),
            'url'   => $this->url,
            'jenisBantuan' => $this->jenisBantuan
        ];

        $pdf = new Dompdf;

        $html = view("/bantuan/laporan/cetakPenduduk", $data);

        $pdf->loadHtml($html);
        $pdf->setPaper('A4', 'potrait');
        $pdf->render();
        return $pdf->stream();
    }
}
