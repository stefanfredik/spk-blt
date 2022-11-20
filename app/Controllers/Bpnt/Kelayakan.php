<?php

namespace App\Controllers\Bpnt;

use App\Controllers\BaseController;
use App\Models\KelayakanModel;
use CodeIgniter\API\ResponseTrait;

class Kelayakan extends BaseController {
    use ResponseTrait;
    private $url = 'bpnt/kelayakan';
    private $jenisBantuan = 'bpnt';
    private $totalNilaiKriteria;

    public function __construct() {
        $this->kelayakanModel = new KelayakanModel();
    }

    public function getIndex() {
        $data = [
            'url' => $this->url,
            'title' => 'Data Kelayakan'
        ];

        return view("/bantuan/kelayakan/index", $data);
    }

    public function getTable() {
        $data = [
            'title' => 'Data Kelayakan',
            'url'   => $this->url,
            'dataKelayakan' => $this->kelayakanModel->where('jenis_bantuan', $this->jenisBantuan)->findAll(),
        ];

        return view('/bantuan/kelayakan/table', $data);
    }

    public function getTambah() {
        $data = [
            'title' => 'Tambah Data Kelayakan',
            'url'   => $this->url
        ];

        return view('/bantuan/kelayakan/tambah', $data);
    }

    public function getEdit($id) {
        $data = [
            'title' => 'Edit Data Kelayakan',
            'kelayakan'  => $this->kelayakanModel->find($id),
            'url'   => $this->url
        ];

        return $this->respond(view('/bantuan/kelayakan/edit', $data), 200);
    }

    public function postIndex() {
        $data = $this->request->getPost();
        $data['jenis_bantuan'] = $this->jenisBantuan;

        $this->kelayakanModel->save($data);
        $res = [
            'status' => 'success',
            'msg'   => 'Data Kelayakan Berhasil Ditambahkan.',
            'data'  => $data
        ];

        return $this->respond($res, 200);
    }


    public function postSaveedit($id) {
        $data = $this->request->getPost();
        $this->kelayakanModel->update($id, $data);

        $res = [
            'status' => 'success',
            'msg'   => 'Data User Berhasil Diupdate.',
            'data'  => $data
        ];

        return $this->respond($res, 200);
    }

    public function deleteDelete($id) {
        $this->kelayakanModel->delete($id);
        $res = [
            'status'    => 'success',
            'msg'     => 'Data berhasil dihapus.',
        ];

        return $this->respond($res, 200);
    }
}
