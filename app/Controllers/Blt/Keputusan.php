<?php

namespace App\Controllers\Blt;

use App\Controllers\BaseController;
use App\Models\BltModel;
use App\Models\KriteriaModel;
use App\Models\NilaiKelayakanModel;
use App\Models\PendudukModel;
use App\Models\SubkriteriaModel;

class Keputusan extends BaseController {
    private $url = 'blt/keputusan';
    private $jenisBantuan = 'blt';
    private $totalNilaiKriteria;

    public function __construct() {
        $this->kriteriaModel = new KriteriaModel();
        $this->pendudukModel = new PendudukModel();
        $this->subkriteriaModel = new SubkriteriaModel();
        $this->bltModel = new BltModel();
        $this->nilaiKelayakanModel = new NilaiKelayakanModel();
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
            'url' => $this->url,
            'nilaiKelayakan' => $this->nilaiKelayakanModel->where('jenis_bantuan', $this->jenisBantuan)->first()
        ];


        return view('/bantuan/keputusan/index', $data);
    }

    public function postNilaikelayakan() {
        $nilai =  $this->request->getPost('nilai');

        $data = [
            'jenis_bantuan' => $this->jenisBantuan,
            'nilai'     => $nilai
        ];

        $result = $this->nilaiKelayakanModel->where('jenis_bantuan', $this->jenisBantuan)->countAll();

        if ($result > 0) {
            $this->nilaiKelayakanModel->where('jenis_bantuan', $this->jenisBantuan)->delete();
        }

        $this->nilaiKelayakanModel->save($data);
        return redirect()->back();
    }
}
