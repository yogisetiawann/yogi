<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\UserModel;
use CodeIgniter\Email\Email;

class Register extends BaseController
{

    private function generateToken()
    {
        return bin2hex(random_bytes(32));
    }

    public function index()
    {
        return view('login');
    }

    public function process()
    {
        $validationRules = [
            'email' => 'required|min_length[4]|max_length[100]',
            'username' => 'required|min_length[4]|max_length[20]|is_unique[user.username]',
            'password' => 'required|min_length[4]|max_length[50]',
            'confirm_password' => 'required|matches[password]'
        ];

        $validationMessages = [
            'email' => [
                'required' => 'Email harus diisi.',
                'min_length' => 'Email minimal 4 karakter.',
                'max_length' => 'Email maksimal 100 karakter.'
            ],
            'username' => [
                'required' => 'Username harus diisi.',
                'min_length' => 'Username minimal 4 karakter.',
                'max_length' => 'Username maksimal 20 karakter.',
                'is_unique' => 'Username sudah digunakan sebelumnya.'
            ],
            'password' => [
                'required' => 'Password harus diisi.',
                'min_length' => 'Password minimal 4 karakter.',
                'max_length' => 'Password maksimal 50 karakter.'
            ],
            'confirm_password' => [
                'required' => 'Konfirmasi password harus diisi.',
                'matches' => 'Konfirmasi password tidak cocok dengan password.'
            ]
        ];

        $isValid = $this->validate($validationRules, $validationMessages);

        if (!$isValid) {
            return redirect()->to('/login')->withInput()->with('error', 'Validasi gagal.');
        }

        $users = new UserModel();
        $email = $this->request->getVar('email');

        // Cek apakah email sudah terdaftar
        $userExists = $users->cekuser('user', ['email' => $email]);
        if ($userExists) {
            return redirect()->to('/login')->withInput()->with('error', 'Email ini sudah terdaftar.');
        }

        // Generate token verifikasi
        $token = $this->generateToken();

        // Proses registrasi jika email belum terdaftar
        $users->insert([
            'email' => $email,
            'username' => $this->request->getVar('username'),
            'password' => md5($this->request->getVar('password')),
            'role' => 'User',
            'token' => $token,
        ]);

        // Kirim email verifikasi
        $this->sendVerificationEmail($email, $token);

        return redirect()->to('/login')->with('success', 'Akun telah berhasil dibuat! Silahkan Cek verifikasi di Email Kamu! :)');
    }


    public function sendVerificationEmail($emailuser, $token)
    {
        $email = \Config\Services::email();

        $email->setFrom('ecorycorporation@gmail.com', 'ECORY CORPORATION');
        $email->setTo($emailuser);
        $email->setSubject('Email Verifikasi');

        $message = view('verification_email', ['token' => $token]);

        $email->setMessage($message);

        if ($email->send()) {
            return true;
        } else {
            return false;
        }
    }

    public function verify()
    {
        $UserModel = new UserModel();
        $token = $this->request->getVar('token');
        $user = $UserModel->where('token', $token)->first();

        if ($user) {
            // Verifikasi waktu
            $verificationTime = strtotime($user['create_at']);
            $currentTime = time();
            $timeDifference = $currentTime - $verificationTime;

            if ($timeDifference > 60) {
                // Hapus data pengguna yang melebihi batas waktu verifikasi
                $UserModel->delete($user['id']);
                return redirect()->to('/login')->with('error', 'Verifikasi akun telah melebihi batas waktu.');
            }

            // Jika waktu verifikasi masih dalam batas 1 menit, perbarui status verifikasi dan status akun
            $UserModel->update($user['id'], [
                'status_validasi' => 'valid',
                'status_akun' => 'aktif'
            ]);
            return redirect()->to('/login')->with('success', 'Akun telah berhasil diverifikasi!');
        } else {
            return redirect()->to('/login')->with('error', 'Akun kamu gagal verifikasi!');
        }
    }
}
