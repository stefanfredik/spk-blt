<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\BltModel;
use App\Models\BpntModel;
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
    }

    public function getIndex() {
        $data = [
            'title' => 'Halaman Dashboard',
            'jumPenduduk' => $this->pendudukModel->countAll(),
            'jumBlt' => $this->bltModel->countAll(),
            'jumBpnt' => $this->bpntModel->countAll(),
            'jumUser' =>  $this->userModel->countAll(),
        ];

        if (in_groups('Pendamping BLT')) return view('dashboard/indexPendampingBlt', $data);
        if (in_groups('Pendamping BPNT')) return view('dashboard/indexPendampingBpnt', $data);
        if (in_groups('Kepala Desa')) return view('dashboard/indexKepalaDesa', $data);
        if (in_groups('Admin')) return view('dashboard/index', $data);
    }
}
