<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\MDataVoucher;

class LihatVoucher extends BaseController
{
    public function index()
    {
        $voucher = new MDataVoucher();
        $data['data'] = $voucher->findAll();

        return view('v_lihatvoucher', $data);
    }
}
