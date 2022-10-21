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
}
