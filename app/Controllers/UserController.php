<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\UserModel;
use App\Models\TransaksiModel;

class UserController extends BaseController
{
    private $UserModel;
    private $TransaksiModel;

    public function __construct()
    {
        $this->UserModel = new UserModel();
        $this->TransaksiModel = new TransaksiModel();
    }

    public function index()
    {
        $data['user'] = $this->UserModel->getAllUsers();
        $data['accountStatusOptions'] = ['aktif' => 'Aktif', 'nonaktif' => 'Nonaktif']; // Tambahkan baris ini
        $data['laporan'] = $this->TransaksiModel->getLaporanPenjualan();

        echo view('admin_header', $data);
        echo view('v_tabeluser', $data);
        echo view('admin_footer', $data);
    }

    public function search()
    {
        $searchTerm = $this->request->getGet('search');

        $data['user'] = $this->UserModel->searchUsers($searchTerm);

        echo view('admin_header', $data);
        echo view('v_tabeluser', $data);
        echo view('admin_footer', $data);
    }

    public function edit($id)
    {
        $user = $this->UserModel->getUser($id);
        $data = [
            'title' => 'edit sampah',
            'user' => $user,
            'accountStatusOptions' => ['aktif' => 'Aktif', 'nonaktif' => 'Nonaktif'], // Tambahkan baris ini untuk memberikan pilihan status akun
            'roleOptions' => [
                'Admin' => 'Admin',
                'BumDes' => 'BumDes',
                'User' => 'User'
            ]
        ];
        echo view('admin_header', $data);
        echo view('v_editrole', $data);
        echo view('admin_footer', $data);
    }

    public function editRole($id)
    {
        $user = $this->UserModel->getUser($id);
        $data = [
            'title' => 'Edit Role',
            'user' => $user,
            'roleOptions' => ['Admin' => 'Admin', 'BumDes' => 'BumDes', 'User' => 'User']
        ];
        echo view('admin_header', $data);
        echo view('v_editrole', $data);
        echo view('admin_footer', $data);
    }

    public function prosesedituser($id)
    {
        $data = [
            'id' => $id,
            'role' => $this->request->getPost('role'),
            'status_akun' => $this->request->getPost('status_akun') // Tambahkan baris ini untuk mengupdate status akun
        ];
        $this->UserModel->editDataUser($data);
        session()->setFlashdata('success_message', 'Berhasil Merubah Data');
        return redirect()->to(base_url('UserController'));
    }

    public function prosesEditRole($id)
    {
        $data = [
            'id' => $id,
            'role' => $this->request->getPost('role')
        ];
        $this->UserModel->editDataUserRole($data);
        session()->setFlashdata('success_message', 'Berhasil Merubah Role');
        return redirect()->to(base_url('UserController'));
    }

    public function delete($id)
    {
        $user = $this->UserModel->find($id);

        if (!$user) {
            // User tidak ditemukan, atur penanganan kesalahan sesuai kebutuhan (misalnya, tampilkan halaman error)
            return redirect()->back()->with('error', 'User tidak ditemukan.');
        }

        $this->UserModel->delete($id);

        session()->setFlashdata('success_message', 'Pengguna berhasil dihapus.');
        return redirect()->to('user');
    }

    public function nonaktifkan($id)
    {
        $user = $this->UserModel->getUser($id);

        if (!$user) {
            return redirect()->back()->with('error', 'User tidak ditemukan.');
        }

        $data = [
            'id' => $id,
            'status_akun' => 'nonaktif'
        ];

        $this->UserModel->editDataUser($data);

        session()->setFlashdata('success_message', 'Akun berhasil dinonaktifkan.');
        return redirect()->to('user');
    }

    public function aktifkan($id)
    {
        $user = $this->UserModel->getUser($id);

        if (!$user) {
            return redirect()->back()->with('error', 'User tidak ditemukan.');
        }

        $data = [
            'id' => $id,
            'status_akun' => 'aktif'
        ];

        $this->UserModel->editDataUser($data);

        session()->setFlashdata('success_message', 'Akun berhasil diaktifkan.');
        return redirect()->to('user');
    }
}
