<?php

namespace App\Controllers;

use App\Models\MDataSampah;
use App\Models\TransaksiModel;
use App\Models\MPoin;

class Poin extends BaseController
{
    public function index()
    {
        $poinModel = new MPoin();
        $poin = $poinModel->findAll();

        return view('v_poin', ['v_poin' => $poin]);
    }

    public function konversiPoin()
    {
        $transaksiModel = new TransaksiModel();
        $poinModel = new MPoin();
        $dataSampahModel = new MDataSampah();

        $transaksi = $transaksiModel->findAll(); // Ambil semua data transaksi

        foreach ($transaksi as $row) {
            $dataSampah = $dataSampahModel->find($row['data_sampah_id']); // Ambil data sampah berdasarkan ID

            $hargaRupiah = $row['total_harga']; // Harga transaksi dalam rupiah
            $hargaSampah = $dataSampah['harga_sampah']; // Harga sampah

            $hargaPoin = $this->konversiRupiahKePoin($hargaRupiah, $hargaSampah); // Konversi harga menjadi poin

            // Simpan data poin
            $poinData = [
                'transaksi_id' => $row['id'],
                'user_id' => session()->get('id'),
                'jumlah_poin' => $hargaPoin
            ];

            $poinModel->insert($poinData);
        }

        return redirect()->to('v_poin');
    }

    private function konversiRupiahKePoin($hargaRupiah, $hargaSampah)
    {
        // Misalkan 1 rupiah setara dengan 10 poin
        $poin = $hargaRupiah * 10 / $hargaSampah;

        return $poin;
    }
}
