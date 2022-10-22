<?php

namespace App\Controllers\Blt;

use App\Controllers\BaseController;
use App\Models\BltModel;
use App\Models\KriteriaModel;
use App\Models\PendudukModel;
use App\Models\SubkriteriaModel;
use CodeIgniter\API\ResponseTrait;

class Datapeserta extends BaseController
{
    use ResponseTrait;

    private $url = 'blt/datapeserta';
    private $title = 'Data Peserta';
    private $jumlahKriteria = 0;
    private $jenisBantuan = 'blt';

    public function __construct()
    {
        $this->kriteriaModel = new KriteriaModel();
        $this->pendudukModel = new PendudukModel();
        $this->subkriteriaModel = new SubkriteriaModel();
        $this->bltModel = new BltModel();
        $this->jumlahKriteria = $this->kriteriaModel->where('jenis_bantuan', $this->jenisBantuan)->countAllResults();
    }

    public function getIndex()
    {
        $data = [
            'url' => $this->url,
            'title' => 'Data Peserta'
        ];

        return view('/blt/peserta/index', $data);
    }

    public function getTambah()
    {
        $data = [
            'title' => 'Tambah Data Peserta',
            'url'   => $this->url,
            'dataPenduduk' => $this->pendudukModel->findAll(),
            'dataKriteria' => $this->kriteriaModel->where('jenis_bantuan', $this->jenisBantuan)->findAll(),
            'dataSubkriteria' => $this->subkriteriaModel->findAll(),
        ];

        return view('/blt/peserta/tambah', $data);
    }

    public function getTable()
    {
        $data = [
            'title' => 'Data Peserta',
            'url'   => $this->url,
            'dataKriteria' => $this->kriteriaModel->where('jenis_bantuan', $this->jenisBantuan)->findAll(),
            'dataPenduduk' => $this->pendudukModel->findAll(),
            'dataPeserta' => $this->bltModel->findAllDataBlt(),
        ];

        return view('/blt/peserta/table', $data);
    }

    public function getEdit($id)
    {

        $data = [
            'title' => 'Edit Data Peserta',
            'dataKriteria'  => $this->kriteriaModel->findAll(),
            'dataSubkriteria' => $this->subkriteriaModel->findAll(),
            'dataPenduduk' => $this->pendudukModel->findAll(),
            'peserta' => $this->bltModel->find($id),
            'url'   => $this->url
        ];

        return $this->respond(view('/blt/peserta/edit', $data), 200);
    }

    public function getDetail($id)
    {

        $data = [

            'dataKriteria'  => $this->kriteriaModel->findAll(),
            'dataSubkriteria' => $this->subkriteriaModel->findAll(),
            'dataPenduduk' => $this->pendudukModel->findAll(),
            'peserta' => $this->bltModel->findDataBlt($id),
            'url'   => $this->url
        ];

        $data['title'] = 'Detail ' . $data['peserta']['nama_lengkap'];

        return $this->respond(view('/blt/peserta/detail', $data), 200);
    }

    public function postIndex()
    {
        $data = $this->request->getPost();
        $this->bltModel->save($data);

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
        $this->bltModel->update($id, $data);

        $res = [
            'status' => 'success',
            'msg'   => 'Data User Berhasil Diupdate.',
            'data'  => $data
        ];

        return $this->respond($res, 200);
    }



    public function deleteDelete($id)
    {

        $this->bltModel->delete($id);

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
