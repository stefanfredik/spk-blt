<?php

namespace App\Controllers\Bpnt;

use App\Controllers\BaseController;
use App\Models\BpntModel;
use App\Models\KriteriaModel;
use App\Models\PendudukModel;
use App\Models\SubkriteriaModel;

class Keputusan extends BaseController {
    private $url = 'bpnt/keputusan';
    private $jenisBantuan = 'bpnt';
    private $totalNilaiKriteria;

    public function __construct() {
        $this->kriteriaModel = new KriteriaModel();
        $this->pendudukModel = new PendudukModel();
        $this->subkriteriaModel = new SubkriteriaModel();
        $this->bltModel = new BpntModel();

        $this->jumlahKriteria = $this->kriteriaModel->where('jenis_bantuan', $this->jenisBantuan)->countAllResults();
    }


    public function getIndex() {
        $this->totalNilaiKriteria = $this->kriteriaModel->where('jenis_bantuan', $this->jenisBantuan)->selectSum('nilai')->first()['nilai'];

        $data = [
            'title' => 'Data Perhitungan dan Table Moora',
            'dataKriteria' => $this->kriteriaModel->where('jenis_bantuan', $this->jenisBantuan)->findAll(),
            'totalNilaiKriteria' => $this->totalNilaiKriteria,
            'dataPeserta' => $this->bltModel->findAllDataBpnt(),
            'dataSubkriteria' => $this->subkriteriaModel->where('jenis_bantuan', $this->jenisBantuan)->findAll(),
        ];


        return view('/bantuan/keputusan/index', $data);
    }
}
