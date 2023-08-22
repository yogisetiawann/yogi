<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\MPoin;
use App\Models\MDataSampah;

class Home_user extends BaseController
{
    private $MPoin;

    public function __construct()
    {
        helper('form');
        $this->MPoin = new MPoin();
    }

    public function index()
    {
        $dataSampahModel = new MDataSampah();
        $data['data'] = $dataSampahModel->findAll();
        $userId = session()->get('id');
        $dataPoin = $this->MPoin->getdataPoin($userId);

        if ($dataPoin) {
            $data = [
                'data' => $dataPoin
            ];
        } else {
            $data = [
                'data' => ['poin' => 0] // Atur nilai default jika data poin tidak ditemukan
            ];
        }

        // echo view('user/tampilan_user_header', $data);
        echo view('user/tampilan_user', $data);

        echo view('user/tampilan_user_footer', $data);
    }
}
