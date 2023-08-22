<?php

namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\ModelLogin;
use App\Models\UserModel;

class Login extends BaseController
{
    protected $ModelUser, $UserModel;
    protected $table = "user";

    public function __construct()
    {
        $this->ModelUser = new ModelLogin;
        $this->UserModel = new UserModel();
    }

    public function Admin()
    {
        return view('login');
    }

    public function proses_login()
    {
        $username = $this->request->getPost('username');
        $password = $this->request->getPost('password');

        $where = [
            'username' => $username,
        ];

        $user = $this->UserModel->getUserByUsername($username);

        if ($user) {
            if (md5($password) === $user['password']) {
                if ($user['status_validasi'] != 'valid') {
                    session()->setFlashdata('verif', 'Akun kamu belum diverifikasi');
                    return redirect()->to('/login');
                }

                session()->set('id', $user['id']);
                session()->set('username', $user['username']);
                session()->set('role', $user['role']);
                session()->set('token', $user['token']);
                session()->set('status_validasi', $user['status_validasi']);

                if ($user['role'] == 'Admin') {
                    return redirect()->to('/admin');
                } elseif ($user['role'] == 'BumDes') {
                    return redirect()->to('admin_bumdes');
                } else {
                    return redirect()->to('Home_user');
                }
            } else {
                session()->setFlashdata('pesan', 'Password anda salah!');
                return redirect()->to(base_url('login'));
            }
        } else {
            session()->setFlashdata('pesan', 'Username tidak terdaftar, Silahkan buat akun terlebih dahulu!');
            return redirect()->to(base_url('login'));
        }
    }

    public function logout()
    {
        // Hapus semua data session
        session()->destroy();

        // Redirect ke halaman login
        return redirect()->to('/login');
    }
}
