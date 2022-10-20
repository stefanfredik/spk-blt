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
}
