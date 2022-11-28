<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\UserModel;
use CodeIgniter\API\ResponseTrait;
use CodeIgniter\I18n\Time;

class Logins extends BaseController {
    use ResponseTrait;

    public function getIndex() {
        if (session()->get('isLogin')) return redirect()->to('/dashboard');

        if ($this->request->getPost()) {
            return $this->login();
        }

        $data = [
            'title' => 'Halaman Login'
        ];

        return view('/login/index', $data);
    }


    public function postIndex() {
        if ($this->request->getPost()) {
            return $this->login();
        }
    }

    private function login() {
        $username   = $this->request->getPost('username');
        $password   = $this->request->getPost('pass');
        $userModel  = new UserModel();
        $data       = $userModel->where('username', $username)->first('username');

        if ($data) {
            $pass   = $data['password'];
            if (!password_verify($password, $pass)) {
                $res = [
                    'status' => 'error',
                    'msg'   => 'Password salah!'
                ];

                return $this->respond($res);
            }

            $now = new Time('now');
            $userModel->update($data['id'], ['last_login' => $now]);

            $session = [
                'isLogin' => true,
                'id'      => $data['id'],
                'username' => $data['username'],
                'namaUser' => $data['nama_user'],
                'jabatan'   => $data['jabatan'],
            ];

            $this->session->set($session);
            $res = [
                'status' => 'success',
                'msg'   => 'Login Berhasil'
            ];
            return $this->respond($res);
        } else {
            $res = [
                'status' => 'error',
                'msg'   => 'Username tidak ditemukan!'
            ];
            return $this->respond($res);
        }
    }

    public function logout() {
        $this->session->destroy();
        return redirect()->to('home');
    }
}
