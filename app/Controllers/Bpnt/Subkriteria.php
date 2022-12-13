<?php

namespace App\Controllers\Bpnt;

use App\Controllers\BaseController;
use App\Models\KriteriaModel;
use App\Models\SubkriteriaModel;
use CodeIgniter\API\ResponseTrait;

class Subkriteria extends BaseController {
    use ResponseTrait;
    var $url = 'bpnt/subkriteria';
    var $jenisBantuan = 'bpnt';

    public function __construct() {
        $this->subkriteriaModel = new SubkriteriaModel();
        $this->kriteriaModel = new KriteriaModel();
    }

    public function getIndex() {

        $data = [
            'url' => $this->url,
            'title' => 'Data Sub Kriteria BPNT'
        ];

        return view('/bantuan/subkriteria/index', $data);
    }

    public function getTambah() {
        $data = [
            'title' => 'Tambah Data Sub Kriteria BPNT',
            'kriteriaData' => $this->kriteriaModel->where('jenis_bantuan', $this->jenisBantuan)->findAll(),
            'url'   => $this->url
        ];

        return view('/bantuan/subkriteria/tambah', $data);
    }
    public function getTable() {
        $data = [
            'title' => 'Data Sub Kriteria BPNT',
            'url'   => $this->url,
            'dataSubkriteria' => $this->subkriteriaModel->findAllSubkriteria($this->jenisBantuan),
            'dataKriteria' => $this->kriteriaModel->where('jenis_bantuan', $this->jenisBantuan)->findAll(),
        ];

        return view('/bantuan/subkriteria/table', $data);
    }

    public function getEdit($id) {

        $data = [
            'title' => 'Edit Data Sub Kriteria BPNT',
            'data'  => $this->subkriteriaModel->find($id),
            'dataKriteria' => $this->kriteriaModel->where('jenis_bantuan', $this->jenisBantuan)->findAll(),
            'url'   => $this->url
        ];

        return $this->respond(view('/bantuan/subkriteria/edit', $data), 200);
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
            'msg'   => 'Data berhasil diupdate.',
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
