<?php

namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\ModelLogin;

class Home extends BaseController
{
    protected $ModelUser;
    protected $table = 'user';

    public function __construct()
    {
        $this->ModelUser = new ModelLogin;
    }

    public function index()
    {
        return view('Home/welcome_message');
    }
    public function about()
    {
        return view('Home/about');
    }
    public function peta()
    {
        return view('Home/peta');
    }
    public function fitur()
    {
        return view('Home/fitur');
    }
    public function berita()
    {
        return view('Home/berita');
    }
    public function artikel()
    {
        return view('Home/artikel');
    }
    
    public function login()
    {
        return view('login');
    }
}
