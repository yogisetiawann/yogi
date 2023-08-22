<?php

namespace App\Models;

use CodeIgniter\Model;

class KodeVoucher extends Model
{
    protected $table = 'kode_voucher';
    protected $primaryKey = 'id';
    protected $allowedFields = ['user_id', 'kode_voucher', 'produk_id', 'status_voucher', 'tanggal', 'stok_voucher'];

    public function getVoucher($id)
    {
        return $this->db->table($this->table)
            ->select('kode_voucher.*, produk.nama_produk')
            ->join('produk', 'produk.id = kode_voucher.produk_id')
            ->where('kode_voucher.id', $id)
            ->get()->getRowArray();
    }

    public function getVoucherCari()
    {
        return $this->db->table($this->table)
            ->select('kode_voucher.*, produk.nama_produk')
            ->join('produk', 'produk.id = kode_voucher.produk_id')
            ->get()->getResultArray();
    }

    public function searchVoucher($keyword)
    {
        $query = $this->db->table($this->table)
            ->select('kode_voucher.*, produk.nama_produk')
            ->join('produk', 'produk.id = kode_voucher.produk_id');

        if (!empty($keyword)) {
            $query->groupStart()
                ->like('produk.nama_produk', $keyword)
                ->orLike('kode_voucher', $keyword)
                ->groupEnd();
        }

        return $query->get()->getResultArray();
    }
}
