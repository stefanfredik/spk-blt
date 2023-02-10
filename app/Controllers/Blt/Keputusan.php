<?php

namespace App\Controllers\Blt;


use App\Controllers\BaseController;
use App\Libraries\Moora;
use App\Models\BltModel;
use App\Models\KelayakanModel;
use App\Models\KeputusanBltModel;
use App\Models\KeputusanModel;
use App\Models\KriteriaModel;
use App\Models\NilaiKelayakanModel;
use App\Models\PendudukModel;
use App\Models\SubkriteriaModel;

class Keputusan extends BaseController {
    private $url = 'blt/keputusan';
    private $jenisBantuan = 'blt';

    public function __construct() {
        $this->kriteriaModel = new KriteriaModel();
        $this->pendudukModel = new PendudukModel();
        $this->subkriteriaModel = new SubkriteriaModel();
        $this->bltModel = new BltModel();
        $this->nilaiKelayakanModel = new NilaiKelayakanModel();
        $this->jumlahKriteria = $this->kriteriaModel->where('jenis_bantuan', $this->jenisBantuan)->countAllResults();
        $this->kelayakanModel = new KelayakanModel();
        $this->keputusanModel = new KeputusanBltModel();
    }

    public function getIndex() {
        $kriteria       = $this->kriteriaModel->where('jenis_bantuan', $this->jenisBantuan)->findAll();
        $subkriteria    = $this->subkriteriaModel->where('jenis_bantuan', $this->jenisBantuan)->findAll();
        $peserta        = $this->bltModel->findAllDataBlt();
        $kelayakan      = $this->kelayakanModel->where('jenis_bantuan', $this->jenisBantuan)->findAll();

        helper('Check');
        $check = checkdata($peserta, $kriteria, $subkriteria, $kelayakan);
        if ($check) return view('/error/index', ['title' => 'Error', 'listError' => $check]);

        $moora = new Moora($peserta, $kriteria, $subkriteria, $kelayakan);



        $data = [
            'title'         => 'Data Perhitungan dan Table Moora',
            'url'           => $this->url,
            'peserta'       => $moora->getAllPeserta(),
            'kelayakan'     => $kelayakan
        ];

        $peserta = [];

        foreach ($data['peserta'] as $key => $ps) {
            $peserta[$key]['nama_lengkap'] = $ps['nama_lengkap'];
            $peserta[$key]['no_kk'] = $ps['no_kk'];
            $peserta[$key]['tempat_lahir'] = $ps['tempat_lahir'];
            $peserta[$key]['tanggal_lahir'] = $ps['tanggal_lahir'];
            $peserta[$key]['jenis_kelamin'] = $ps['jenis_kelamin'];
            $peserta[$key]['nilai'] = $ps['kriteria_nilai'];
            $peserta[$key]['status_layak'] = $ps['status_layak'];
        }

        $this->keputusanModel->truncate();
        $this->keputusanModel->insertBatch($peserta);


        return view('/bantuan/keputusan/index', $data);
    }
}
