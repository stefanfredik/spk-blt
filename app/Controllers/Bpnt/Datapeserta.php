<?php

namespace App\Controllers\Bpnt;

use App\Controllers\BaseController;
use App\Models\BpntModel;
use App\Models\KriteriaModel;
use App\Models\PendudukModel;
use App\Models\SubkriteriaModel;
use CodeIgniter\API\ResponseTrait;

class Datapeserta extends BaseController {
    use ResponseTrait;

    private $url = 'bpnt/datapeserta';
    private $title = 'Data Peserta Bntp';
    private $jumlahKriteria = 0;
    private $jenisBantuan = 'bpnt';

    public function __construct() {
        $this->kriteriaModel = new KriteriaModel();
        $this->pendudukModel = new PendudukModel();
        $this->subkriteriaModel = new SubkriteriaModel();
        $this->bpntModel = new BpntModel();
        $this->jumlahKriteria = $this->kriteriaModel->where('jenis_bantuan', $this->jenisBantuan)->countAllResults();
    }

    public function getIndex() {
        $data = [
            'url' => $this->url,
            'title' => 'Data Peserta BPNT'
        ];

        return view('/bantuan/peserta/index', $data);
    }

    public function getTambah() {
        $data = [
            'title' => 'Tambah Data Peserta',
            'url'   => $this->url,
            'dataPenduduk' => $this->pendudukModel->findAllNonBantuan(),
            'dataKriteria' => $this->kriteriaModel->where('jenis_bantuan', $this->jenisBantuan)->findAll(),
            'dataSubkriteria' => $this->subkriteriaModel->where('jenis_bantuan', $this->jenisBantuan)->findAll(),
        ];

        return view('/bantuan/peserta/tambah', $data);
    }

    public function getTable() {
        $data = [
            'title' => 'Data Peserta',
            'url'   => $this->url,
            'dataKriteria' => $this->kriteriaModel->where('jenis_bantuan', $this->jenisBantuan)->findAll(),
            'dataPenduduk' => $this->pendudukModel->findAll(),
            'dataPeserta' => $this->bpntModel->findAllDataBpnt(),
        ];

        return view('/bantuan/peserta/table', $data);
    }

    public function getEdit($id) {
        $data = [
            'title' => 'Edit Data Peserta',
            'dataKriteria'  => $this->kriteriaModel->where('jenis_bantuan', $this->jenisBantuan)->findAll(),
            'dataSubkriteria' => $this->subkriteriaModel->where('jenis_bantuan', $this->jenisBantuan)->findAll(),
            'dataPenduduk' => $this->pendudukModel->findAll(),
            'peserta' => $this->bpntModel->find($id),
            'url'   => $this->url
        ];

        return $this->respond(view('/bantuan/peserta/edit', $data), 200);
    }

    public function getDetail($id) {

        $data = [

            'dataKriteria' => $this->kriteriaModel->where('jenis_bantuan', $this->jenisBantuan)->findAll(),
            'dataSubkriteria' => $this->subkriteriaModel->findAll(),
            'dataPenduduk' => $this->pendudukModel->findAll(),
            'peserta' => $this->bpntModel->findDataBpnt($id),
            'url'   => $this->url
        ];

        $data['title'] = 'Detail ' . $data['peserta']['nama_lengkap'];

        return $this->respond(view('/bantuan/peserta/detail', $data), 200);
    }

    public function postIndex() {
        $data = $this->request->getPost();
        $this->bpntModel->save($data);

        $res = [
            'status' => 'success',
            'msg'   => 'Data Kriteria Berhasil Ditambahkan.',
            'data'  => $data
        ];

        return $this->respond($res, 200);
    }


    public function postSaveedit($id) {
        $data = $this->request->getPost();
        $this->bpntModel->update($id, $data);

        $res = [
            'status' => 'success',
            'msg'   => 'Data User Berhasil Diupdate.',
            'data'  => $data
        ];

        return $this->respond($res, 200);
    }



    public function deleteDelete($id) {

        $this->bpntModel->delete($id);

        $res = [
            'status'    => 'success',
            'msg'     => 'Data berhasil dihapus.',
        ];

        return $this->respond($res, 200);
    }

    private function statusBerkas($id) {
        $this->Peserta->first($id);
    }
}
