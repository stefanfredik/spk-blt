<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\KriteriaModel;
use App\Models\SubkriteriaModel;
use CodeIgniter\API\ResponseTrait;

class Subkriteria extends BaseController {
    use ResponseTrait;
    var $url = 'subkriteria';

    public function __construct() {
        $this->subkriteriaModel = new SubkriteriaModel();
        $this->kriteriaModel = new KriteriaModel();
    }

    public function getIndex() {

        $data = [
            'url' => $this->url,
            'title' => 'Data Sub Kriteria'
        ];

        return view('/subkriteria/index', $data);
    }

    public function getTambah() {
        $data = [
            'title' => 'Tambah Data Kriteria',
            'dataKriteria' => $this->kriteriaModel->findAll(),
            'url'   => $this->url
        ];

        return view('/subkriteria/tambah', $data);
    }
    public function getTable() {
        $data = [
            'title' => 'Data Kriteria',
            'url'   => $this->url,
            'subkriteriaData' => $this->subkriteriaModel->findAll(),
        ];

        return view('/subkriteria/table', $data);
    }

    public function getEdit($id) {
        $data = [
            'title' => 'Edit Data Penduduk',
            'data'  => $this->subkriteriaModel->find($id),
            'dataKriteria' => $this->kriteriaModel->findAll(),
            'url'   => $this->url
        ];

        return $this->respond(view('/subkriteria/edit', $data), 200);
    }

    public function postIndex() {
        $data = $this->request->getPost();
        $this->subkriteriaModel->save($data);

        $res = [
            'status' => 'success',
            'msg'   => 'Data Sub Kriteria Berhasil Ditambahkan.',
            'data'  => $data
        ];

        return $this->respond($res, 200);
    }


    public function postSaveedit($id) {
        $data = $this->request->getPost();
        $this->subkriteriaModel->update($id, $data);

        $res = [
            'status' => 'success',
            'msg'   => 'Data User Berhasil Diupdate.',
            'data'  => $data
        ];

        return $this->respond($res, 200);
    }



    public function deleteDelete($id) {

        $this->subkriteriaModel->delete($id);

        $res = [
            'status'    => 'success',
            'msg'     => 'Data berhasil dihapus.',
        ];

        return $this->respond($res, 200);
    }
}
