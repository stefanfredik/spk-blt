<?php

namespace App\Models;

use CodeIgniter\Model;

class KeputusanBpntModel extends Model {
    protected $DBGroup          = 'default';
    protected $table            = 'keputusan_bpnt';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $insertID         = 0;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = false;
    protected $allowedFields    = ['nama_lengkap', 'no_kk', 'tempat_lahir', 'tanggal_lahir', 'jenis_kelamin', 'nilai', 'status_layak'];
}
