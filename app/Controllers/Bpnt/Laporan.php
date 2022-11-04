<?php

namespace App\Controllers\Bpnt;

use App\Controllers\BaseController;
use App\Controllers\Bpnt\Subkriteria;
use App\Models\BpntModel;
use App\Models\KriteriaModel;
use App\Models\SubkriteriaModel;
use CodeIgniter\API\ResponseTrait;
use Dompdf\Dompdf;

class Laporan extends BaseController {
    use ResponseTrait;

    private $url = 'bpnt/laporan';
    private $title = 'Laporan Data BPNT';
    private $jumlahKriteria = 0;
    private $jenisBantuan = 'bpnt';


    public function __construct() {
        $this->bpntModel  = new BpntModel();
        $this->kriteriaModel = new KriteriaModel();
        $this->subkriteriaModel = new SubkriteriaModel();
    }

    public function getIndex() {
        $data = [
            'title' => 'Laporan',
            'dataPeserta' => $this->bpntModel->findAllDataBpnt(),
            'dataKriteria' => $this->kriteriaModel->where('jenis_bantuan', $this->jenisBantuan)->findAll(),
            'dataSubkriteria' => $this->subkriteriaModel->where('jenis_bantuan', $this->jenisBantuan)->findAll(),
            'url'   => $this->url,
            'jenisBantuan' => $this->jenisBantuan
        ];

        // dd($data);
        return view('bantuan/laporan/index', $data);
    }

    public function getCetak($bantuan) {
        if ($bantuan == 'bpnt') {
            return $this->cetakBpnt();
        } else if ($bantuan == 'penduduk') {
            return $this->cetakPenduduk();
        }

        throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
    }


    private function cetakBpnt() {
        $data = [
            'title' => 'Laporan',
            'dataPeserta' => $this->bpntModel->findAllDataBpnt(),
            'dataKriteria' => $this->kriteriaModel->where('jenis_bantuan', $this->jenisBantuan)->findAll(),
            'dataSubkriteria' => $this->subkriteriaModel->where('jenis_bantuan', $this->jenisBantuan)->findAll(),
            'url'   => $this->url
        ];

        $pdf = new Dompdf;

        $html = view("/bantuan/laporan/cetakBpnt", $data);

        $pdf->loadHtml($html);
        $pdf->setPaper('A4', 'potrait');
        $pdf->render();
        return $pdf->stream();
    }

    private function cetakPenduduk() {
        $data = [
            'title' => 'Laporan',
            'dataPeserta' => $this->bpntModel->findAllDataBlt(),
            'dataKriteria' => $this->kriteriaModel->where('jenis_bantuan', $this->jenisBantuan)->findAll(),
            'dataSubkriteria' => $this->subkriteriaModel->where('jenis_bantuan', $this->jenisBantuan)->findAll(),
            'url'   => $this->url
        ];

        $pdf = new Dompdf;

        $html = view("/bantuan/laporan/cetakPenduduk", $data);

        $pdf->loadHtml($html);
        $pdf->setPaper('A4', 'potrait');
        $pdf->render();
        return $pdf->stream();
    }
}
