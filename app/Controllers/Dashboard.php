<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\MDataSampah;
use App\Models\UserModel;
use App\Models\TransaksiModel;

class Dashboard extends BaseController
{
    public function index()
    {
        $model = new MDataSampah();
        $totalSampah = $model->getTotalSampah();

        $userModel = new UserModel();
        $totalUser = $userModel->getTotalUser();

        $transaksiModel = new TransaksiModel(); // Buat instance dari TransaksiModel
        $totalTransaksi = $transaksiModel->getTotalTransaksi(); // Ambil jumlah transaksi
        $totalPenjualan = $transaksiModel->getTotalHargaTransaksi();

        echo view('admin_header');
        echo view('admin', [
            'totalSampah' => $totalSampah,
            'totalUser' => $totalUser,
            'totalTransaksi' => $totalTransaksi, // Pass totalTransaksi ke view
            'totalPenjualan' => $totalPenjualan // Tambahkan totalPenjualan ke dalam array
        ]);
        echo view('admin_footer');
    }
}
