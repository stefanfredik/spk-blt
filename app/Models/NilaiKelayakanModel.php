<?php

namespace App\Models;

use CodeIgniter\Model;

class NilaiKelayakanModel extends Model {
    protected $DBGroup          = 'default';
    protected $table            = 'nilaikelayakan';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $insertID         = 0;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = ['id', 'jenis_bantuan', 'nilai'];
}
