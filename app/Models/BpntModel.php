<?php

namespace App\Models;

use CodeIgniter\Model;

class BpntModel extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'databpnt';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $insertID         = 0;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = false;
    protected $allowedFields    = ['id', 'id_penduduk'];

    public function findAllDataBpnt()
    {
        $this->select('databpnt.id as id_databpnt');
        $this->select('penduduk.*');
        $this->select('databpnt.*');
        $this->join('penduduk', 'penduduk.id = databpnt.id_penduduk');
        return $this->findAll();
    }

    public function findDataBpnt($id)
    {
        $this->select('databpnt.id as id_databpnt');
        $this->select('penduduk.*');
        $this->select('databpnt.*');
        $this->join('penduduk', 'penduduk.id = databpnt.id_penduduk');
        return $this->find($id);
    }
}
