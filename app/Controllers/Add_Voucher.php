<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class Add_Voucher extends BaseController
{
    public function index()
    {
        echo view('admin_header');
        echo view('v_addvoucher');
        echo view('admin_footer');
    }
}
