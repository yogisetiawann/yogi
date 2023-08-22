<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class Bumdes extends BaseController
{
    public function index()
    {
        echo view('Bumdes/admin_header_bumdes');
        echo view('Bumdes/admin_bumdes');
        echo view('Bumdes/admin_footer_bumdes');
    }
}
