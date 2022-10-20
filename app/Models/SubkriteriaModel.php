<?php

namespace App\Models;

use CodeIgniter\Model;

class SubkriteriaModel extends Model {
    protected $DBGroup          = 'default';
    protected $table            = 'subkriteria';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $insertID         = 0;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = ['id', 'id_kriteria', 'subkriteria', 'nilai','jenis_bantuan'];


    public function findAllSubkriteria($jenisBantuan) {
        $this->select('subkriteria.*');
        $this->select('kriteria.kriteria');
        $this->join('kriteria', 'kriteria.id = subkriteria.id_kriteria');
        $this->orderBy('id_kriteria', 'ASC');
        $this->where('subkriteria.jenis_bantuan',$jenisBantuan);
        return parent::findAll();
    }
}
