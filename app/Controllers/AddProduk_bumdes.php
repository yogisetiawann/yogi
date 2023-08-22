<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class AddProduk_bumdes extends BaseController
{
    public function index()
    {
        echo view('bumdes/admin_header_bumdes');
        echo view('bumdes/v_addproduk_b');
        echo view('bumdes/admin_footer_bumdes');
    }
}
