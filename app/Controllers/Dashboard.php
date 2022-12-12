<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Controllers\Blt\Subkriteria;
use App\Libraries\Moora;
use App\Models\BltModel;
use App\Models\BpntModel;
use App\Models\KelayakanModel;
use App\Models\KriteriaModel;
use App\Models\PendudukModel;
use App\Models\SubkriteriaModel;
use App\Models\MyUserModel;

class Dashboard extends BaseController {

    public function __construct() {
        $this->bltModel  = new BltModel();
        $this->bpntModel  = new BpntModel();
        $this->userModel = new MyUserModel();
        $this->pendudukModel = new PendudukModel();
        $this->kelayakanModel = new KelayakanModel();
    }

    public function getIndex() {
        $data = [
            'title' => 'Halaman Dashboard',
            'jumPenduduk' => $this->pendudukModel->countAll(),
            'jumBlt' => $this->bltModel->countAll(),
            'jumBpnt' => $this->bpntModel->countAll(),
            'jumUser' =>  $this->userModel->countAll(),
            'dataKelayakanBlt' => $this->kelayakanModel->where('jenis_bantuan', 'blt')->findAll(),
            'dataKelayakanBpnt' => $this->kelayakanModel->where('jenis_bantuan', 'bpnt')->findAll(),
            'dataJumKelayakanBlt' => $this->jumKelayakan('blt'),
            'dataJumKelayakanBpnt' => $this->jumKelayakan('bpnt'),

        ];

        if (in_groups('Pendamping BLT')) return view('dashboard/indexPendampingBlt', $data);
        if (in_groups('Pendamping BPNT')) return view('dashboard/indexPendampingBpnt', $data);
        if (in_groups('Kepala Desa')) return view('dashboard/indexKepalaDesa', $data);
        if (in_groups('Admin')) return view('dashboard/index', $data);
    }


    private function jumKelayakan($jenisBantuan): array {
        $kriteriaModel = new KriteriaModel();
        $subkriteriaModel = new SubkriteriaModel();

        $dataPeserta = $jenisBantuan == 'blt' ? $this->bltModel->findAll() : $this->bpntModel->findAll();

        $dataKriteria = $kriteriaModel->where('jenis_bantuan', $jenisBantuan)->findAll();
        $dataSubkriteria = $subkriteriaModel->findAll();
        $dataKelayakan = $this->kelayakanModel->where('jenis_bantuan', $jenisBantuan)->findAll();

        $moora = new Moora($dataPeserta, $dataKriteria, $dataSubkriteria, $dataKelayakan);

        $peserta = $moora->getAllPeserta();

        // dd($peserta);

        $ket = [];

        foreach ($dataKelayakan as $i => $kl) {
            $jum[$i] = 0;
            foreach ($peserta  as $ps) {
                if ($kl['keterangan'] == $ps['status_layak']) {
                    $jum[$i]++;
                }
            }

            array_push($ket, $jum[$i]);
        }


        return $ket;
    }
}
