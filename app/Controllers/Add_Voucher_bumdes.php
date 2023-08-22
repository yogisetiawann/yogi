<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class Add_Voucher_bumdes extends BaseController
{
    public function index()
    {
        echo view('Bumdes/admin_header_bumdes');
        echo view('Bumdes/v_addvoucher_b');
        echo view('Bumdes/admin_footer_bumdes');
    }
}
