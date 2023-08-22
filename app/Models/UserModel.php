<?php

namespace App\Models;

use CodeIgniter\Model;

class UserModel extends Model
{
    protected $table      = 'user'; // Nama tabel di database
    protected $primaryKey = 'id'; // Nama primary key
    protected $allowedFields = ['username', 'password', 'email', 'role', 'token', 'status_validasi', 'status_akun']; // Kolom yang diizinkan untuk diisi
    protected $useTimestamps = true; // Mengaktifkan timestamp (created_at dan updated_at)
    protected $createdField  = 'create_at'; // Nama kolom untuk created_at
    protected $updatedField  = 'update_at'; // Nama kolom untuk updated_at
    protected $validationRules = [
        'username' => 'required|alpha_numeric_space|min_length[4]|is_unique[user.username]',
        'password' => 'required|min_length[4]',
        'email'    => 'required|valid_email|is_unique[user.email]'
    ]; // Aturan validasi untuk setiap field


    protected $validationMessages = [
        'username' => [
            'required'            => 'Username harus diisi.',
            'alpha_numeric_space' => 'Username hanya boleh berisi huruf, angka, dan spasi.',
            'min_length'          => 'Username minimal 4 karakter.',
            'is_unique'           => 'Username sudah digunakan.'
        ],
        'password' => [
            'required'   => 'Password harus diisi.',
            'min_length' => 'Password minimal 6 karakter.'
        ],
        'email'    => [
            'required'     => 'Email harus diisi.',
            'valid_email'  => 'Format email tidak valid.',
            'is_unique'    => 'Email sudah digunakan.'
        ]
    ]; // Pesan kesalahan validasi untuk setiap field

    public function getAllUsers()
    {
        return $this->findAll();
    }

    public function getUserIdByEmail($email)
    {
        $user = $this->where('email', $email)->first();
        return $user['id'] ?? null;
    }

    public function searchUsers($searchTerm)
    {
        // Melakukan pencarian yang tidak memperhatikan besar kecil huruf untuk kata yang diberikan pada kolom username
        $query = $this->db->table('user')
            ->like('username', $searchTerm, 'both') // Gunakan wildcard di kedua sisi (%term%)
            ->get();

        return $query->getResultArray();
    }

    public function editDataUser($data)
    {
        $this->db->table($this->table)
            ->where($this->primaryKey, $data['id'])
            ->update(['status_akun' => $data['status_akun']]);
    }

    public function editDataUserRole($data)
    {
        $this->db->table($this->table)
            ->where($this->primaryKey, $data['id'])
            ->update(['role' => $data['role']]);
    }

    public function getUser($id)
    {
        return $this->db->table('user')
            ->where('id', $id)
            ->get()->getRowArray();
    }

    public function cekuser($table, $where)
    {
        return $this->db->table($table)->where($where)->get()->getRowArray();
    }

    public function getUserByUsername($username)
    {
        return $this->where('username', $username)
            ->where('status_akun', 'aktif')
            ->first();
    }
    
    public function getTotalUser()
    {
        return $this->countAllResults();
    }
    
}
