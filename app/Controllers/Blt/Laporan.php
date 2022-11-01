<?php

namespace App\Controllers\Blt;

use App\Controllers\BaseController;
use App\Controllers\Bpnt\Subkriteria;
use App\Models\BltModel;
use App\Models\KriteriaModel;
use App\Models\SubkriteriaModel;
use CodeIgniter\API\ResponseTrait;

class Laporan extends BaseController {
    use ResponseTrait;

    private $url = 'bpnt/laporan';
    private $title = 'Data Peserta Bntp';
    private $jumlahKriteria = 0;
    private $jenisBantuan = 'blt';


    public function __construct() {
        $this->bltModel  = new BltModel();
        $this->kriteriaModel = new KriteriaModel();
        $this->subkriteriaModel = new SubkriteriaModel();
    }

    public function getIndex() {
        $data = [
            'title' => 'Laporan',
            'dataPeserta' => $this->bltModel->findAllDataBlt(),
            'dataKriteria' => $this->kriteriaModel->where('jenis_bantuan', $this->jenisBantuan)->findAll(),
            'dataSubkriteria' => $this->subkriteriaModel->where('jenis_bantuan', $this->jenisBantuan)->findAll(),
            'url'   => $this->url
        ];

        // dd($data);
        return view('bantuan/laporan/index', $data);
    }
}
