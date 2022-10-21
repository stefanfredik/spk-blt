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
    protected $allowedFields    = ['id', 'id_kriteria', 'subkriteria', 'nilai'];


    public function findAll(int $limit = 0, int $offset = 0) {
        $this->select('subkriteria.*');
        $this->select('kriteria.kriteria');
        $this->join('kriteria', 'kriteria.id = subkriteria.id_kriteria');
        $this->orderBy('id_kriteria', 'ASC');
        return parent::findAll();
    }
}
