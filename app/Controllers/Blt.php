<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class Blt extends BaseController {
    private $url = 'blt';
    private $title = 'Data Keputusan Blt';

    public function getIndex() {

        $data = [
            'url' => $this->url,
            'title' => $this->title
        ];

        return view('/blt/index', $data);
    }

    public function getTable() {
        $data = [
            'title' => $this->title,
            'url'   => $this->url,
            // 'subkriteriaData' => $this->subkriteriaModel->findAll(),
        ];

        return view('/blt/table', $data);
    }
}
