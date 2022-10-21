<?php

namespace App\Models;

use CodeIgniter\Model;

class KriteriaModel extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'kriteria';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $insertID         = 0;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = ['id', 'kriteria', 'nilai', 'keterangan', 'type', 'jenis_bantuan'];
}
