<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\TransaksiModel;
use App\Models\MDataSampah;

class DetailTransaksi extends BaseController
{
    private $TransaksiModel;
    private $DataSampahModel;

    public function __construct()
    {
        $this->TransaksiModel = new TransaksiModel();
        $this->DataSampahModel = new MDataSampah();
    }

    public function index()
    {
        $transaksiData = $this->TransaksiModel->where('user_id', session()->get('id'))->findAll();

        $data = [
            'title' => 'datasampah',
            'data' => []
        ];

        foreach ($transaksiData as $row) {
            $sampahData = $this->DataSampahModel->getSampah($row['data_sampah_id']);
            $row['nama_sampah'] = $sampahData['nama_sampah'];
            $data['data'][] = $row;
        }

        echo view('user/tampilan_user_header', $data);
        echo view('v_detailTransaksi', $data);
    }
}
