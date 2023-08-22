<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class AddProduk extends BaseController
{
    public function index()
    {
        echo view('admin_header');
        echo view('v_addproduk');
        echo view('admin_footer');
    }
}
