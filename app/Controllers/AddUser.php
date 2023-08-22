<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class AddUser extends BaseController
{
    public function index()
    {
        echo view('admin_header');
        echo view('v_adduser');
        echo view('admin_footer');
    }
}
