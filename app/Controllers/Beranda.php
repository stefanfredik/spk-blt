<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class Beranda extends BaseController {
    public function getIndex() {
        return view("home/index");
    }
}
