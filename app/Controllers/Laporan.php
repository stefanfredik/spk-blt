<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class Laporan extends BaseController {
    public function index() {
        //
    }


    public function getBpnt() {
        $data = [
            'title' => 'Laporan Bantuan BPNT'
        ];
        return view('laporan/bpnt', $data);
    }

    public function getBlt() {
        $data = [
            'title' => 'Laporan Bantuan BLT'
        ];
        return view('laporan/blt', $data);
    }
}
