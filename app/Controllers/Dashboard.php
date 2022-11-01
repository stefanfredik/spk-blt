<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class Dashboard extends BaseController {
    public function getIndex() {
        $data = [
            'title' => 'Dashboard'
        ];
        return view('/home/index', $data);
    }
}
