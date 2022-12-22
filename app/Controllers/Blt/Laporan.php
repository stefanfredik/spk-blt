<?php

namespace App\Controllers\Blt;

use App\Controllers\BaseController;
use App\Controllers\Bpnt\Subkriteria;
use App\Models\BltModel;
use App\Models\KriteriaModel;
use App\Models\SubkriteriaModel;
use CodeIgniter\API\ResponseTrait;
use Dompdf\Dompdf;
use App\Libraries\Moora;
use App\Models\KelayakanModel;

class Laporan extends BaseController {
    use ResponseTrait;

    private $url = 'blt/laporan';
    private $title = 'Data Peserta BLT';
    private $jumlahKriteria = 0;
    private $jenisBantuan = 'blt';


    public function __construct() {
        $this->bltModel  = new BltModel();
        $this->kriteriaModel = new KriteriaModel();
        $this->subkriteriaModel = new SubkriteriaModel();
        $this->kelayakanModel = new KelayakanModel();
    }

    public function getIndex() {
        $data = [
            'title' => $this->title,
            'dataPeserta' => $this->getPeserta(),
            'dataKriteria' => $this->kriteriaModel->where('jenis_bantuan', $this->jenisBantuan)->findAll(),
            'dataSubkriteria' => $this->subkriteriaModel->where('jenis_bantuan', $this->jenisBantuan)->findAll(),
            'url'   => $this->url,
            'jenisBantuan' => $this->jenisBantuan
        ];

        // dd($data);
        return view('bantuan/laporan/index', $data);
    }

    public function getCetak($bantuan) {
        if ($bantuan == 'blt') {
            return $this->cetakBlt();
        } else if ($bantuan == 'penduduk') {
            return $this->cetakPenduduk();
        }

        throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
    }


    private function cetakBlt() {
        $data = [
            'title' => 'Laporan',
            'dataPeserta' => $this->bltModel->findAllDataBlt(),
            'dataKriteria' => $this->kriteriaModel->where('jenis_bantuan', $this->jenisBantuan)->findAll(),
            'dataSubkriteria' => $this->subkriteriaModel->where('jenis_bantuan', $this->jenisBantuan)->findAll(),
            'url'   => $this->url,
            'jenisBantuan' => $this->jenisBantuan
        ];

        $pdf = new Dompdf;

        $html = view("/bantuan/laporan/cetakBlt", $data);

        $pdf->loadHtml($html);
        $pdf->setPaper('A4', 'potrait');
        $pdf->render();
        return $pdf->stream();
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

    private function getPeserta(): array {
        $kriteria       = $this->kriteriaModel->where('jenis_bantuan', $this->jenisBantuan)->findAll();
        $subkriteria    = $this->subkriteriaModel->where('jenis_bantuan', $this->jenisBantuan)->findAll();
        if ($this->jenisBantuan == 'blt') {
        }
        $peserta        = $this->bltModel->findAllDataBlt();
        $kelayakan      = $this->kelayakanModel->where('jenis_bantuan', $this->jenisBantuan)->findAll();

        helper('Check');
        $check = checkdata($peserta, $kriteria, $subkriteria, $kelayakan);
        if ($check) return view('/error/index', ['title' => 'Error', 'listError' => $check]);

        $moora = new Moora($peserta, $kriteria, $subkriteria, $kelayakan);
        return $moora->getAllPeserta();
    }
}
