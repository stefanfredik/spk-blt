<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\KriteriaModel;
use App\Models\Peserta;
use App\Models\PendudukModel;
use App\Models\SubkriteriaModel;
use CodeIgniter\API\ResponseTrait;

class Peserta extends BaseController
{
    use ResponseTrait;

    private $url = 'kriteriapenduduk';
    private $title = 'Data Kriteria Penududukan';
    private $jumlahKriteria = 0;

    public function __construct()
    {
        $this->kriteriaModel = new KriteriaModel();
        $this->pendudukModel = new PendudukModel();
        $this->subkriteriaModel = new SubkriteriaModel();
        $this->Peserta = new Peserta();


        $this->jumlahKriteria = $this->kriteriaModel->countAllResults();
    }

    public function getIndex()
    {
        $data = [
            'url' => $this->url,
            'title' => 'Data Kriteria'
        ];

        return view('/kriteriapenduduk/index', $data);
    }

    public function getTambah()
    {
        $data = [
            'title' => 'Tambah Data Penduduk',
            'url'   => $this->url,
            'dataPenduduk' => $this->pendudukModel->findAll(),
            'dataKriteria' => $this->kriteriaModel->findAll()
        ];

        return view('/kriteriapenduduk/tambah', $data);
    }

    public function getTable()
    {
        $data = [
            'title' => 'Data Kriteria',
            'url'   => $this->url,
            'kriteriaData' => $this->kriteriaModel->findAll(),
            'dataPenduduk'  => $this->pendudukModel->findAll(),
            'dataKriteriapenduduk' => $this->pendudukModel->findAllData()
        ];

        return view('/kriteriapenduduk/table', $data);
    }

    public function getEdit($id)
    {

        $data = [
            'title' => 'Edit Data Kriteria Penduduk',
            'dataKriteria'  => $this->kriteriaModel->findAll(),
            'dataSubkriteria' => $this->subkriteriaModel->findAll(),
            'id'    => $id,
            'url'   => $this->url
        ];

        return $this->respond(view('/kriteriapenduduk/edit', $data), 200);
    }

    public function getDetail($id)
    {

        $data = [
            'title' => 'Edit Data Kriteria Penduduk',
            'dataKriteria'  => $this->kriteriaModel->findAll(),
            'dataSubkriteria' => $this->subkriteriaModel->findAll(),
            'id'    => $id,
            'url'   => $this->url
        ];

        return $this->respond(view('/kriteriapenduduk/edit', $data), 200);
    }

    public function postIndex()
    {
        $data = $this->request->getPost();
        $this->kriteriaModel->save($data);

        $res = [
            'status' => 'success',
            'msg'   => 'Data Kriteria Berhasil Ditambahkan.',
            'data'  => $data
        ];

        return $this->respond($res, 200);
    }


    public function postSaveedit($id)
    {
        $data = $this->request->getPost();
        $this->kriteriaModel->update($id, $data);

        $res = [
            'status' => 'success',
            'msg'   => 'Data User Berhasil Diupdate.',
            'data'  => $data
        ];

        return $this->respond($res, 200);
    }



    public function deleteDelete($id)
    {

        $this->kriteriaModel->delete($id);

        $res = [
            'status'    => 'success',
            'msg'     => 'Data berhasil dihapus.',
        ];

        return $this->respond($res, 200);
    }

    private function statusBerkas($id)
    {
        $this->Peserta->first($id);
    }
}
