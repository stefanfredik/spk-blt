<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\MyUserModel;
use CodeIgniter\API\ResponseTrait;
use Myth\Auth\Password;

class Profile extends BaseController {
    use ResponseTrait;

    public $url = 'profile';

    public function __construct() {
        $this->userModel = new MyUserModel();
    }

    public function index() {
        // dd(user());
        $data = [
            'title' => 'Halaman Profile',
            'user' => $this->userModel->find(user_id())
        ];


        return view('profile/index', $data);
    }


    public function gantiPassword() {
        $rules = [
            'password' => [
                'rules' => 'required|min_length[8]',
                'errors' => [
                    'min_length' => 'Password minimal 8 Digit.'
                ]
            ],
        ];

        if (!$this->validate($rules)) {
            return $this->respond([
                'status' => 'error',
                'error' => $this->validation->getErrors()
            ], 400);
        }

        $password = $this->request->getPost('password');
        $data = [
            'password_hash' => Password::hash($password)
        ];
        $this->userModel->update(user_id(), $data);

        $res = [
            'status' => 'success',
            'msg'   => 'Password Berhasil diubah.'
        ];

        return $this->respond($res, 200);
    }


    public function editPassword() {
        $data = [
            'title' => 'Edit Password',
            'url'   => $this->url
        ];

        return view('/profile/modalEdit', $data);
    }
}
