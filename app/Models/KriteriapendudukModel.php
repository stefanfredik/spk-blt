<?php

namespace App\Models;

use CodeIgniter\Model;

class KriteriapendudukModel extends Model {
    protected $DBGroup          = 'default';
    protected $table            = 'kriteriapenduduk';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $insertID         = 0;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = false;
    protected $allowedFields    = ['id', 'id_penduduk'];
}
