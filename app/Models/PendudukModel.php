<?php

namespace App\Models;

use CodeIgniter\Model;

class PendudukModel extends Model {
    protected $DBGroup          = 'default';
    protected $table            = 'penduduk';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $insertID         = 0;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = ['id', 'id_user', 'nik', 'no_kk', 'nama_lengkap', 'tempat_lahir', 'tanggal_lahir', 'jenis_kelamin', 'alamat', 'rt', 'rw', 'desa', 'status', 'created_at', 'updated_at'];

    // Dates
    protected $useTimestamps = false;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    // protected $deletedField  = 'deleted_at';


    public function test() {
        // dd($this->select('*')->join('user', 'user.id = penduduk.id_user', 'left')->findAll());
    }

    public function findAllData() {
        $this->select('penduduk.*');
        $this->select('kriteriapenduduk.*', 'kriteriapenduduk.id as Kri');


        $this->join('kriteriapenduduk', 'penduduk.id = kriteriapenduduk.id_penduduk', 'left', 'penduduk.id as pend');
        return $this->findAll();
    }
}
