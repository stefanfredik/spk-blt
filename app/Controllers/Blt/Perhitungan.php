<?php

namespace App\Controllers\Blt;

use App\Controllers\BaseController;
use App\Models\BltModel;
use App\Models\KriteriaModel;
use App\Models\PendudukModel;
use App\Models\SubkriteriaModel;

class Perhitungan extends BaseController {
    private $url = 'blt/perhitungan';
    private $jenisBantuan = 'blt';
    private $jumlahKriteria;
    private $totalNilaiKriteria;

    public function __construct() {
        $this->kriteriaModel = new KriteriaModel();
        $this->pendudukModel = new PendudukModel();
        $this->subkriteriaModel = new SubkriteriaModel();
        $this->bltModel = new BltModel();

        $this->jumlahKriteria = $this->kriteriaModel->where('jenis_bantuan', $this->jenisBantuan)->countAllResults();
    }


    public function getIndex() {
        $this->totalNilaiKriteria = $this->kriteriaModel->where('jenis_bantuan', $this->jenisBantuan)->selectSum('nilai')->first()['nilai'];

        $data = [
            'title' => 'Data Perhitungan dan Table Moora',
            'dataKriteria' => $this->kriteriaModel->where('jenis_bantuan', $this->jenisBantuan)->findAll(),
            'totalNilaiKriteria' => $this->totalNilaiKriteria,
            'dataPeserta' => $this->bltModel->findAllDataBlt(),
            'dataSubkriteria' => $this->subkriteriaModel->where('jenis_bantuan', $this->jenisBantuan)->findAll(),
        ];


        return view('blt/perhitungan/index', $data);
    }
}
