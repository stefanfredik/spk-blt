<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class Laporan extends BaseController {
    public function getIndex() {
        return view('laporan/index');
    }
}
