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
        return $this->respond($data);
    }

    public function postIndex() {
        $data = $this->request->getPost();
        $data['status'] = "Tidak Ada";

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
                    'ext_in' => 'Jenis File tidak Cocok dengan kriteria.'
                ]
            ],
        ];

        if (!$this->validate($rules)) {
            return $this->respond([
                'status' => 'error',
                'error' => $this->validation->getError("excel")
            ], 400);
        }

        $file = $this->request->getFile("excel");
        $fileName = $file->getName();

        $file->move(WRITEPATH . 'uploads/penduduk', 'test.xlsx', $fileName);

        $reader = new \PhpOffice\PhpSpreadsheet\Reader\Xlsx();

        $spreadsheet = $reader->load(WRITEPATH . 'uploads/penduduk/' . $fileName);

        $dataExcel = $spreadsheet->getSheet(0)->toArray();
        unset($dataExcel[0]);

        $data  = array();

        foreach ($dataExcel as $t) {
            $dt["nik"] = $t[0];
            $dt["no_kk"] = $t[1];
            $dt["nama_lengkap"] = $t[2];
            $dt["tempat_lahir"] = $t[3];
            $dt["tanggal_lahir"] = $t[4];
            $dt["jenis_kelamin"] = $t[5];
            $dt["alamat"] = $t[6];
            $dt["rt"] = $t[7];
            $dt["rw"] = $t[8];
            $dt["desa"] = $t[9];

            array_push($data, $dt);
        }

        $data['status'] = "Tidak Ada";

        unlink(WRITEPATH . 'uploads/penduduk/' . $fileName);

        foreach ($data as $dt) {
            $this->pendudukModel->save($dt);
        }

        $res = [
            'status' => 'success',
            'msg'   => 'Data Excel Berhasil di Import.',
            'data'  => $data
        ];

        return $this->respond($res, 200);
    }
}
