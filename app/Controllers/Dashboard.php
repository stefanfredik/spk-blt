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

        switch (session()->get('jabatan')) {
            case 'Pendamping BLT':
                return view('dashboard/indexPendampingBlt', $data);
                break;
            case 'Pendamping BPNT':
                return view('dashboard/indexPendampingBpnt', $data);
                break;

            case 'Kepala Desa':
                return view('dashboard/indexKepalaDesa', $data);
                break;
            default:
                return view('dashboard/index', $data);
        }
    }
}
