<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\TransaksiModel;
use App\Models\MDataSampah;
use App\Models\MDataProduk;
use App\Models\KodeVoucher;

class DetailVoucher extends BaseController
{
    private $DataKodeVoucher;
    private $ProdukModel;

    public function __construct()
    {
        $this->DataKodeVoucher = new KodeVoucher();
        $this->ProdukModel = new MDataProduk();
    }

    public function index()
    {
        $transaksiVoucher = $this->DataKodeVoucher->where('user_id', session()->get('id'))->findAll();

        $data = [
            'title' => 'dataVoucher',
            'data' => []
        ];

        foreach ($transaksiVoucher as $row) {
            $produkData = $this->ProdukModel->getDataProdukById($row['produk_id']);
            $row['nama_produk'] = $produkData['nama_produk'];
            $data['data'][] = $row;
        }

        echo view('user/tampilan_user_header', $data);
        echo view('v_detailTransaksi_voucher', $data);
    }
}
