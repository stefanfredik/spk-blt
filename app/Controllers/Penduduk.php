<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\PendudukModel;

class Penduduk extends BaseController {
    public function __construct() {
        $this->pendudukModel = new PendudukModel();
    }
    public function getIndex() {
        $faker = \Faker\Factory::create('id_ID');
        return  $faker->name;
        // return $this->pendudukModel->test();
    }
}
