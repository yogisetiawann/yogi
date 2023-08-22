<?php

namespace App\Models;

use CodeIgniter\Model;

class MDataSampah extends Model
{
    protected $table = 'data_sampah';
    protected $primaryKey = 'id';
    protected $allowedFields = ['jenis_sampah', 'nama_sampah', 'harga_sampah'];

    public function getDataSampah()
    {
        return $this->findAll();
    }

    public function getSampahByJenis($jenis)
    {
        return $this->where('jenis_sampah', $jenis)->findAll();
    }

    public function getNamaSampahByJenis($jenisSampah)
    {
        return $this->where('jenis_sampah', $jenisSampah)->findAll();
    }


    public function getTotalSampah()
    {
        return $this->db->table('data_sampah')->countAllResults();
    }

    public function inserWTODataSampah($data)
    {
        $this->db->table('data_sampah')->insert($data);
    }

    public function getSampah($id)
    {
        return $this->db->table('data_sampah')
            ->where('id', $id)
            ->get()->getRowArray();
    }

    public function getBeratById($id)
    {
        return $this->db->table('data_sampah')
            ->select('berat')
            ->where('id', $id)
            ->get()->getRowArray();
    }

    public function getSampahByJenisNama($jenis_sampah, $nama_sampah)
    {
        return $this->db->table('data_sampah')
            ->where('jenis_sampah', $jenis_sampah)
            ->where('nama_sampah', $nama_sampah)
            ->get()
            ->getRowArray();
    }


    public function editDataSampah($data)
    {
        $this->db->table('data_sampah')->where('id', $data['id'])->update($data);
    }

    public function hapusDataSampah($data)
    {
        // Hapus data transaksi terlebih dahulu
        $this->db->table('transaksi')->where('data_sampah_id', $data['id'])->delete();

        // Setelah itu baru hapus data sampah
        $this->db->table('data_sampah')->where('id', $data['id'])->delete($data);
    }


    public function getDataSampahById($id)
    {
        return $this->db->table('data_sampah')
            ->where('id', $id)
            ->get()
            ->getRowArray();
    }

    public function searchUsers($searchTerm)
    {
        // Melakukan pencarian yang tidak memperhatikan besar kecil huruf untuk kata yang diberikan pada kolom nama_sampah dan jenis_sampah
        $query = $this->db->table('data_sampah')
            ->like('nama_sampah', $searchTerm, 'both') // Gunakan wildcard di kedua sisi (%term%)
            ->orWhere('jenis_sampah', $searchTerm) // Cari berdasarkan jenis_sampah juga
            ->get();

        return $query->getResultArray();
    }
    public function searchSampah($searchTerm)
    {
        $builder = $this->db->table('data_sampah');
        $builder->like('nama_sampah', $searchTerm);
        return $builder->get()->getResultArray();
    }
}
