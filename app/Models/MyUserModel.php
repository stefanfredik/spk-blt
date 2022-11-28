<?php

namespace App\Models;

use CodeIgniter\Model;
use Myth\Auth\Models\UserModel as MythUserModel;

class MyUserModel extends MythUserModel {
    protected $DBGroup          = 'default';
    protected $table            = 'users';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $insertID         = 0;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields  = [
        'nama_user', 'email', 'username', 'last_login', 'password_hash', 'reset_hash', 'reset_at', 'reset_expires', 'activate_hash',
        'status', 'status_message', 'active', 'force_pass_reset', 'permissions', 'deleted_at',
    ];

    protected $useTimestamps    = true;
    protected $skipValidation   = true;

    function findAll(int $limit = 0, int $offset = 0) {
        $this->select("users.*");
        $this->select("g.name as jabatan");
        $this->join('auth_groups_users gs', 'users.id = gs.user_id');
        $this->join("auth_groups g", "g.id = gs.group_id");
        return $this->get()->getResultArray();
    }

    function findAllRole() {
        return $this->builder('auth_groups')->get()->getResultArray();
    }

    function find($id = null) {
        $this->select("users.*");
        $this->select("g.name as jabatan");
        $this->join('auth_groups_users gs', 'users.id = gs.user_id');
        $this->join("auth_groups g", "g.id = gs.group_id");
        $this->where("users.id", $id);
        return $this->first();
    }
}
