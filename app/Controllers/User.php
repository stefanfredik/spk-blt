<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\MyUserModel;
use CodeIgniter\API\ResponseTrait;
use Myth\Auth\Password;

class User extends BaseController {
    use ResponseTrait;

    var $url = 'user';

    public function __construct() {
        $this->userModel = new MyUserModel();
    }

    public function getIndex() {
        $data = [
            'title' => 'Data User',
            'url'   => $this->url,
            'userData' => $this->userModel->findAll(),
        ];

        return view('/user/index', $data);
    }


    public function getTambah() {
        $data = [
            'title' => 'Tambah Data User',
            'url'   => $this->url
        ];

        return view('/user/tambah', $data);
    }

    public function getEdit($id) {
        $data = [
            'title' => 'Edit Data User',
            'user'  => $this->userModel->find($id),
            'url'   => $this->url
        ];

        return $this->respond(view('/user/edit', $data), 200);
    }

    public function getTable() {
        $data = [
            'title' => 'Data User',
            'url'   => $this->url,
            'userData' => $this->userModel->findAll(),
        ];

        return view('/user/table', $data);
    }

    public function postIndex() {
        $rules = [
            'username'  => [
                'rules'  => 'required|is_unique[user.username]',
                'errors' => [
                    'is_unique' => 'Username telah digunakan.'
                ]
            ],
            'password' => [
                'rules' => 'required|min_length[8]',
                'errors' => [
                    'min_length' => 'Password minimal 8 Digit.'
                ]
            ],
            'password2' => [
                'rules' => 'required|matches[password]',
                'errors' => [
                    'matches' => 'Password tidak sama.'
                ]
            ]
        ];

        if (!$this->validate($rules)) {
            return $this->respond([
                'status' => 'error',
                'error' => $this->validation->getErrors()
            ], 400);
        }


        $request = $this->request->getPost();

        $data = [
            'nama_user' => $request['nama_user'],
            'username' => $request['username'],
            'password_hash' => Password::hash($request['password']),
            'active'    => "1"
        ];

        $this->userModel->withGroup($request['jabatan'])->save($data);

        $res = [
            'status' => 'success',
            'msg'   => 'Data User Berhasil Ditambahkan.'
        ];

        return $this->respond($res, 200);
    }

    public function putEdit($id) {
        $rules1 = [
            'username'  => [
                'rules'  => 'required|is_unique[user.username]',
                'errors' => [
                    'is_unique' => 'Username telah digunakan.'
                ]
            ],
            'password' => [
                'rules' => 'required|min_length[8]',
                'errors' => [
                    'min_length' => 'Password minimal 8 Digit.'
                ]
            ],
            'password2' => [
                'rules' => 'required|matches[password]',
                'errors' => [
                    'matches' => 'Password tidak sama.'
                ]
            ]
        ];

        $rules2 = [
            'password' => [
                'rules' => 'required|min_length[8]',
                'errors' => [
                    'min_length' => 'Password minimal 8 Digit.'
                ]
            ],
            'password2' => [
                'rules' => 'required|matches[password]',
                'errors' => [
                    'matches' => 'Password tidak sama.'
                ]
            ]
        ];

        if ($this->validate($rules)) {
        }


        return $this->respond($id);
    }

    public function deleteDelete($id) {

        $this->userModel->delete($id);

        $res = [
            'status'    => 'success',
            'msg'     => 'Data berhasil dihapus.',
        ];

        return $this->respond($res, 200);
    }
}
