<?php

namespace App\Controllers\Blt;

use App\Controllers\BaseController;
use App\Models\KriteriaModel;
use App\Models\SubkriteriaModel;
use CodeIgniter\API\ResponseTrait;

class Subkriteria extends BaseController {
    use ResponseTrait;
    var $url = 'blt/subkriteria';
    var $jenisBantuan = 'blt';

    public function __construct() {
        $this->subkriteriaModel = new SubkriteriaModel();
        $this->kriteriaModel = new KriteriaModel();
    }

    public function getIndex() {

        $data = [
            'url' => $this->url,
            'title' => 'Data Sub Kriteria'
        ];

        return view('/blt/subkriteria/index', $data);
    }

    public function getTambah() {
        $data = [
            'title' => 'Tambah Data Kriteria',
            'kriteriaData' => $this->kriteriaModel->where('jenis_bantuan',$this->jenisBantuan)->findAll(),
            'url'   => $this->url
        ];

        return view('/blt/subkriteria/tambah', $data);
    }
    public function getTable() {
        $data = [
            'title' => 'Data Kriteria',
            'url'   => $this->url,
            'subkriteriaData' => $this->subkriteriaModel->findAllSubkriteria($this->jenisBantuan),
        ];

        return view('/blt/subkriteria/table', $data);
    }

    public function getEdit($id) {
        $data = [
            'title' => 'Edit Data Penduduk',
            'data'  => $this->subkriteriaModel->find($id),
            'kriteriaData' => $this->kriteriaModel->where('jenis_bantuan',$this->jenisBantuan)->findAll(),
            'url'   => $this->url
        ];

        return $this->respond(view('/blt/subkriteria/edit', $data), 200);
    }

    public function postIndex() {
        $data = $this->request->getPost();
        $data['jenis_bantuan'] = $this->jenisBantuan;
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
