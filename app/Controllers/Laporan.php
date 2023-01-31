<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\PendudukModel;
use Dompdf\Dompdf;

class Laporan extends BaseController
{

    private $url = 'laporan';

    public function __construct()
    {
        $this->pendudukModel = new PendudukModel();
    }

    public function getIndex()
    {
        $data = [
            'title' => 'Laporan Data Penduduk',
            'url' => $this->url
        ];
        return view('laporan/index', $data);
    }

    public function getCetak()
    {
        return $this->cetakPenduduk();
    }

    public function getTable()
    {
        $data = [
            'title' => 'Laporan Data Penduduk',
            'dataPenduduk' => $this->pendudukModel->findAll(),
            'url' => $this->url
        ];
        return view('laporan/datapenduduk', $data);
    }

    private function cetakPenduduk()
    {
        $data = [
            'title' => 'Laporan Data Penduduk',
            'dataPenduduk' => $this->pendudukModel->findAll(),
            'url' => $this->url
        ];

        $pdf = new Dompdf;

        $html = view("/laporan/cetak", $data);

        $pdf->loadHtml($html);
        $pdf->setPaper('A4', 'landscape');
        $pdf->render();
        return $pdf->stream();
    }
}
