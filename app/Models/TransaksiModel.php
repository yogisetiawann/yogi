<?php

namespace App\Models;

use CodeIgniter\Model;

class TransaksiModel extends Model
{
    protected $table = 'transaksi';
    protected $primaryKey = 'id';
    protected $allowedFields = ['berat', 'total_harga', 'data_sampah_id', 'user_id', 'status_verifikasi', 'tanggal', 'waktu', 'username']; // Tambahkan kolom 'waktu'

    public function updateVerifikasiTransaksi($id, $verifikasi)
    {
        $this->where('id', $id)->set(['status_verifikasi' => $verifikasi])->update();
    }
    public function updatePoinTransaksi($userId, $poin)
    {
        $builder = $this->db->table('transaksi');
        $builder->where('user_id', $userId);
        $builder->orderBy('id', 'DESC');
        $builder->limit(1);
        $builder->update(['poin' => $poin]);
    }
    public function getUser($userId)
    {
        $userModel = new UserModel();
        return $userModel->find($userId);
    }

    public function updateTransaksi($id, $data)
    {
        $this->db->table('transaksi')->where('id', $id)->update($data);
    }

    public function getDataTransaksi()
    {
        $dataTransaksi = $this->db->table('transaksi')
            ->select('transaksi.*, data_sampah.nama_sampah')
            ->join('data_sampah', 'data_sampah.id = transaksi.data_sampah_id')
            ->orderBy('transaksi.id', 'ASC')
            ->get()
            ->getResultArray();

        foreach ($dataTransaksi as &$transaksi) {
            $user = $this->getUser($transaksi['user_id']);
            $transaksi['username'] = $user['username'];
        }

        return $dataTransaksi;
    }

    public function getLaporanPenjualan()
    {
        return $this->db->table('transaksi')
            ->select('transaksi.tanggal, user.username, data_sampah.jenis_sampah, SUM(transaksi.berat) AS total_berat, SUM(transaksi.total_harga) AS total_penjualan')
            ->join('data_sampah', 'data_sampah.id = transaksi.data_sampah_id')
            ->join('user', 'user.id = transaksi.user_id')
            ->groupBy('transaksi.tanggal, user.username, data_sampah.jenis_sampah')
            ->get()
            ->getResultArray();
    }


    public function getDataTransaksiByTanggalBulan($bulan)
    {
        $dataTransaksi = $this->db->table('transaksi')
            ->select('transaksi.*, user.username, data_sampah.nama_sampah, SUM(transaksi.berat) AS total_berat')
            ->join('data_sampah', 'data_sampah.id = transaksi.data_sampah_id')
            ->join('user', 'user.id = transaksi.user_id')
            ->where('MONTH(transaksi.tanggal)', $bulan) // Filter berdasarkan bulan
            ->orderBy('transaksi.id', 'ASC')
            ->groupBy('transaksi.tanggal, user.username, data_sampah.jenis_sampah')
            ->get()
            ->getResultArray();

        // Ubah data_sampah_id menjadi nama_sampah
        $dataSampahModel = new MDataSampah();
        foreach ($dataTransaksi as &$transaksi) {
            $dataSampah = $dataSampahModel->find($transaksi['data_sampah_id']);
            $transaksi['data_sampah_id'] = $dataSampah['nama_sampah'];
        }

        return $dataTransaksi;
    }

    public function getDataTransaksiByBulan($bulan)
    {
        $dataTransaksi = $this->db->table('transaksi')
            ->select('transaksi.tanggal, user.username, data_sampah.nama_sampah, SUM(transaksi.berat) AS total_berat')
            ->join('user', 'user.id = transaksi.user_id')
            ->join('data_sampah', 'data_sampah.id = transaksi.data_sampah_id')
            ->where('MONTH(transaksi.tanggal)', $bulan)
            ->groupBy('transaksi.tanggal, user.username, data_sampah.nama_sampah')
            ->orderBy('transaksi.tanggal', 'ASC')
            ->get()
            ->getResultArray();

        return $dataTransaksi;
    }


    public function getDataSampah()
    {
        // Fetch the data for $dataSampah from the appropriate source
        // For example, you can use the $builder object to query the database

        $builder = $this->db->table('data_sampah');
        $builder->select('*');
        // Add your conditions or joins if needed
        $query = $builder->get();

        return $query->getResult();
    }

    public function getTotalTransaksi()
    {
        return $this->countAll(); // Menghitung jumlah transaksi dari tabel 'transaksi'
    }

    public function getTotalHargaTransaksi()
    {
        return $this->db->table('transaksi')
            ->select('SUM(total_harga) AS total_harga')
            ->get()
            ->getRowArray();
    }

    public function getTotalBeratByBulan($bulan)
    {
        return $this->db->table('transaksi')
            ->select('SUM(berat) AS total_berat')
            ->where('MONTH(tanggal)', $bulan)
            ->get()
            ->getRowArray();
    }


    public function getLaporanPenjualanByBulan($bulan)
    {
        return $this->db->table('transaksi')
            ->select('transaksi.tanggal, user.username, data_sampah.jenis_sampah, SUM(transaksi.berat) AS total_berat, SUM(transaksi.total_harga) AS total_penjualan')
            ->join('data_sampah', 'data_sampah.id = transaksi.data_sampah_id')
            ->join('user', 'user.id = transaksi.user_id')
            ->where('MONTH(transaksi.tanggal)', $bulan)
            ->groupBy('transaksi.tanggal, user.username, data_sampah.jenis_sampah')
            ->get()
            ->getResultArray();
    }


    public function getSumLaporan()
    {
        return $this->db->table('transaksi')
            ->select('SUM(transaksi.berat) AS total_berat, SUM(transaksi.total_harga) AS total_harga')
            ->get()
            ->getRowArray();
    }

    public function dataSampah()
    {
        return $this->belongsTo(MDataSampah::class, 'data_sampah_id', 'id');
    }

    public function updateStatusVerifikasi($id, $status)
    {
        $data = [
            'status_verifikasi' => $status
        ];
        $this->update($id, $data);
    }
    public function getTransaksiByUserId($userId)
    {
        return $this->where('user_id', $userId)->get()->getRowArray();
    }
}
