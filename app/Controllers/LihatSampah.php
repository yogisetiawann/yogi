<?php

namespace App\Controllers;

use App\Models\MDataSampah;

class LihatSampah extends BaseController
{
    public function index()
    {
        $dataSampahModel = new MDataSampah();
        $data['data'] = $dataSampahModel->findAll();

        echo view('user/tampilan_user_header', $data);
        echo view('v_lihatsampah', $data);
        // echo view('user/tampilan_user_footer', $data);
    }
}
