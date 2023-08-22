<?php

namespace App\Models;

use CodeIgniter\Model;

class MDataProduk extends Model
{
    protected $table = 'produk';
    protected $primaryKey = 'id';
    protected $allowedFields = ['nama_produk', 'gambar_produk', 'path_gambar', 'harga', 'keterangan', 'stok', 'status_produk'];

    public function getDataProduk()
    {
        return $this->findAll();
    }
    public function getProdukWithVoucher()
    {
        return $this->db->table('produk')
            ->join('kode_voucher', 'produk.id = kode_voucher.produk_id')
            ->join('user', 'user.id = kode_voucher.user_id')
            ->select('kode_voucher.tanggal, user.username, produk.nama_produk, produk.harga, kode_voucher.stok_voucher, kode_voucher.kode_voucher, kode_voucher.status_voucher')
            ->get()
            ->getResultArray();
    }
    public function getProdukWithVoucherByBulan($bulan)
    {
        return $this->db->table('produk')
            ->join('kode_voucher', 'produk.id = kode_voucher.produk_id')
            ->join('user', 'user.id = kode_voucher.user_id')
            ->select('kode_voucher.tanggal, user.username, produk.nama_produk, produk.harga, kode_voucher.stok_voucher, kode_voucher.kode_voucher, kode_voucher.status_voucher')
            ->where('MONTH(kode_voucher.tanggal)', $bulan)
            ->get()
            ->getResultArray();
    }

    public function decreaseStok($id)
    {
        $this->where('id', $id)->set('stok', 'stok - 1', false)->update();
    }

    public function insertKodeVoucher($data)
    {
        return $this->db->table('kode_voucher')->insert($data);
    }

    public function search($keyword)
    {
        return $this->like('nama_produk', $keyword)->findAll();
    }

    public function getDataProdukById($id)
    {
        return $this->find($id);
    }

    public function getDataProdukByStatus($status)
    {
        return $this->where('status_produk', $status)->findAll();
    }

    public function insertDataProduk($data)
    {
        return $this->insert($data);
    }

    public function updateStatusProduk($id, $status)
    {
        $this->where('id', $id)->set('status_produk', $status)->update();
    }

    public function editDataProduk($data)
    {
        $id = $data['id'];
        unset($data['id']);

        $this->set($data);
        $this->where('id', $id);
        $this->update();

        return $this->affectedRows();
    }

    public function deleteDataProduk($id)
    {
        return $this->delete($id);
    }

    public function getRiwayatVoucherByProductId($productId)
    {
        return $this->db->table('kode_voucher')
            ->join('produk', 'produk.id = kode_voucher.produk_id')
            ->select('kode_voucher.*, produk.nama_produk')
            ->where('produk_id', $productId)
            ->get()
            ->getResultArray();
    }

    public function getRiwayatVoucherByUserId($userId)
    {
        return $this->db->table('kode_voucher')
            ->where('user_id', $userId)
            ->get()
            ->getResultArray();
    }
}
