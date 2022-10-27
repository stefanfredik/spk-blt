<?php

namespace App\Controllers\Blt;

use App\Controllers\BaseController;

class Laporan extends BaseController {
    public function getIndex() {
        $data = [
            'title' => 'Laporan'
        ];

        return view('laporan/index', $data);
    }
}
