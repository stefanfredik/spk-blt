<?php

namespace App\Models;

use CodeIgniter\Model;

class BltModel extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'datablt';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $insertID         = 0;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = false;
    protected $allowedFields    = ['id', 'id_penduduk'];

    public function findAllDataBlt()
    {
        $this->select('datablt.id as id_datablt');
        $this->select('penduduk.*');
        $this->select('datablt.*');
        $this->join('penduduk', 'penduduk.id = datablt.id_penduduk');
        return $this->findAll();
    }

    public function findDataBlt($id)
    {
        $this->select('datablt.id as id_datablt');
        $this->select('penduduk.*');
        $this->select('datablt.*');
        $this->join('penduduk', 'penduduk.id = datablt.id_penduduk');
        return $this->find($id);
    }
}
