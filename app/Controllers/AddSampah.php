<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class AddSampah extends BaseController
{
    public function index()
    {
        echo view('admin_header');
        echo view('v_addsampah');
        echo view('admin_footer');
    }
}
