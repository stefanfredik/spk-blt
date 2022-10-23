<?php

namespace App\Controllers\Blt;

use App\Controllers\BaseController;
use App\Models\KriteriaModel;
use App\Models\BltModel;
use CodeIgniter\API\ResponseTrait;

class Kriteria extends BaseController {
    use ResponseTrait;

    private $url = 'blt/kriteria';
    private $jenisBantuan = 'blt';
    private $dir = 'blt';
    private $table = 'kriteria';

    public function __construct() {
        $this->kriteriaModel = new KriteriaModel();
        $this->Peserta = new BltModel();
        $this->forge = \Config\Database::forge();
    }

    public function getIndex() {
        // dd($this->kriteriaModel->orderBy('id', 'desc')->first()['id']);
        $data = [
            'url' => $this->url,
            'table' => $this->table,
            'title' => 'Data Kriteria'
        ];

        return view('blt/kriteria/index', $data);
    }

    public function getTambah() {
        $data = [
            'title' => 'Tambah Data Kriteria',
            'url'   => $this->url
        ];

        return view('blt/kriteria/tambah', $data);
    }
    public function getTable() {
        $data = [
            'title' => 'Data Kriteria',
            'url'   => $this->url,
            'table' => $this->table,
            'kriteriaData' => $this->kriteriaModel->where('jenis_bantuan', $this->jenisBantuan)->orderBy('keterangan', 'ASC')->findAll(),
        ];

        return view('blt/kriteria/table', $data);
    }

    public function getEdit($id) {
        $data = [
            'title' => 'Edit Data Penduduk',
            'kriteria'  => $this->kriteriaModel->find($id),
            'url'   => $this->url
        ];

        return $this->respond(view('blt/kriteria/edit', $data), 200);
    }

    public function postIndex() {
        $data = $this->request->getPost();
        $data['jenis_bantuan'] = $this->jenisBantuan;

        $this->kriteriaModel->save($data);

        $result = $this->kriteriaModel->orderBy('id', 'desc')->first();
        $column = 'k_' . $result['id'];

        $field = [
            $column => [
                'type' => 'INT'
            ]
        ];

        // return $this->respond($field, 200);

        $this->forge->addColumn('datablt', $field);

        $res = [
            'status' => 'success',
            'msg'   => 'Data Kriteria Berhasil Ditambahkan.',
            'data'  => $data
        ];

        return $this->respond($res, 200);
    }


    public function postSaveedit($id) {
        $data = $this->request->getPost();
        $this->kriteriaModel->update($id, $data);

        $res = [
            'status' => 'success',
            'msg'   => 'Data User Berhasil Diupdate.',
            'data'  => $data
        ];

        return $this->respond($res, 200);
    }



    public function deleteDelete($id) {
        $this->kriteriaModel->delete($id);

        $column = "k_" . $id;
        $this->forge->dropColumn('datablt', $column);

        $res = [
            'status'    => 'success',
            'msg'     => 'Data berhasil dihapus.',
        ];

        return $this->respond($res, 200);
    }
}
