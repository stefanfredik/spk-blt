<?php

namespace App\Controllers\Bpnt;

use App\Controllers\BaseController;
use App\Libraries\Moora;
use App\Models\BpntModel;
use App\Models\KelayakanModel;
use App\Models\KriteriaModel;
use App\Models\PendudukModel;
use App\Models\SubkriteriaModel;

class Perhitungan extends BaseController {
    private $url = 'bpnt/perhitungan';
    private $jenisBantuan = 'bpnt';
    private $totalNilaiKriteria;

    public function __construct() {
        $this->kriteriaModel = new KriteriaModel();
        $this->pendudukModel = new PendudukModel();
        $this->subkriteriaModel = new SubkriteriaModel();
        $this->bltModel = new BpntModel();
        $this->kelayakanModel = new KelayakanModel();

        $this->jumlahKriteria = $this->kriteriaModel->where('jenis_bantuan', $this->jenisBantuan)->countAllResults();
    }


    public function getIndex() {
        $kriteria       = $this->kriteriaModel->where('jenis_bantuan', $this->jenisBantuan)->findAll();
        $subkriteria    = $this->subkriteriaModel->where('jenis_bantuan', $this->jenisBantuan)->findAll();
        $peserta        = $this->bltModel->findAllDataBpnt();
        $kelayakan      = $this->kelayakanModel->where('jenis_bantuan', $this->jenisBantuan)->findAll();

        helper('Check');
        $check = checkdata($peserta, $kriteria, $subkriteria, $kelayakan);
        if ($check) return view('/error/index', ['title' => 'Error', 'listError' => $check]);

        $moora = new Moora($peserta, $kriteria, $subkriteria, $kelayakan);

        $data = [
            'title' => 'Data Perhitungan dan Table Moora',
            'dataKriteria' => $this->kriteriaModel->where('jenis_bantuan', $this->jenisBantuan)->findAll(),
            'totalNilaiKriteria' => $this->totalNilaiKriteria,
            'peserta' => $moora->getAllPeserta(),
            'jumKriteriaBenefit' => $moora->jumKriteriaBenefit,
            'jumKriteriaCost' => $moora->jumKriteriaCost,
            'dataSubkriteria' => $this->subkriteriaModel->where('jenis_bantuan', $this->jenisBantuan)->findAll(),
            'bobotKriteria' => $moora->bobotKriteria
        ];

        return view('/bantuan/perhitungan/index', $data);
    }
}
