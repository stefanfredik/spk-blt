<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\PendudukModel;
use CodeIgniter\API\ResponseTrait;
use PhpOffice\PhpSpreadsheet\Reader\Xlsx;
use PhpOffice\PhpSpreadsheet\Spreadsheet;

class Penduduk extends BaseController {
    use ResponseTrait;
    private $url = 'penduduk';

    public function __construct() {
        $this->pendudukModel = new PendudukModel();
    }

    public function getIndex() {
        $data = [
            'title' => 'Data Penduduk',
            'url'   => $this->url
        ];

        return view('penduduk/index', $data);
    }

    public function getTable() {
        $data = [
            'title' => 'Data Penduduk',
            'url'   => $this->url,
            'pendudukData' => $this->pendudukModel->findAll(),
        ];

        return view('/penduduk/table', $data);
    }

    public function getTambah() {
        $data = [
            'title' => 'Tambah Data User',
            'url'   => $this->url
        ];

        return view('/penduduk/tambah', $data);
    }


    public function getImportexcel() {
        $data = [
            'title' => 'Import File Excel',
            'url'   => $this->url
        ];

        return view('/penduduk/importexcel', $data);
    }

    public function getEdit($id) {
        $data = [
            'title' => 'Edit Data Penduduk',
            'penduduk'  => $this->pendudukModel->find($id),
            'url'   => $this->url
        ];

        return $this->respond(view('/penduduk/edit', $data), 200);
    }

    public function getDetail($id) {
        $data = [
            'title' => 'Detail Data Penduduk',
            'penduduk'  => $this->pendudukModel->find($id),
            'url'   => $this->url
        ];

        return $this->respond(view('/penduduk/detail', $data), 200);
    }


    public function postFile() {
        $data = $this->request->getVar('file');

        // echo "Test";
        return $this->respond($data);
    }

    public function postIndex() {
        $data = $this->request->getPost();
        $this->pendudukModel->save($data);

        $res = [
            'status' => 'success',
            'msg'   => 'Data User Berhasil Ditambahkan.',
            'data'  => $data
        ];

        return $this->respond($res, 200);
    }

    public function postSaveedit($id) {
        $data = $this->request->getPost();
        $this->pendudukModel->update($id, $data);

        $res = [
            'status' => 'success',
            'msg'   => 'Data User Berhasil Diupdate.',
            'data'  => $data
        ];

        return $this->respond($res, 200);
    }


    public function deleteDelete($id) {

        $this->pendudukModel->delete($id);

        $res = [
            'status'    => 'success',
            'msg'     => 'Data berhasil dihapus.',
        ];

        return $this->respond($res, 200);
    }


    public function postUpload() {
        $rules = [
            'excel' => [
                'rules' => [
                    'ext_in[excel,xlsx]'
                ],
                'errors' => [
                    'required' => 'File Belum Diupload.',
                    'ext_in' => 'File tidak Cocok dengan kriteria'
                ]
            ],
        ];

        if (!$this->validate($rules)) {
            dd($this->validation->getErrors());
        }

        $file = $this->request->getFile("excel")->move('penduduk', 'test.xlsx', true);

        $reader = new \PhpOffice\PhpSpreadsheet\Reader\Xlsx();

        $spreadsheet = $reader->load(WRITEPATH . 'uploads/penduduk/test.xlsx');
        // dd($file);

        $d = $spreadsheet->getSheet(0)->toArray();
        unset($d[0]);
        dd($d);
    }

    public function importExcel($file) {
    }
}
