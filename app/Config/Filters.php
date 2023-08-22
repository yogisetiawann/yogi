<?php

namespace Config;

use CodeIgniter\Config\BaseConfig;
use CodeIgniter\Filters\CSRF;
use CodeIgniter\Filters\DebugToolbar;
use CodeIgniter\Filters\Honeypot;
use CodeIgniter\Filters\InvalidChars;
use CodeIgniter\Filters\SecureHeaders;

class Filters extends BaseConfig
{
    /**
     * Configures aliases for Filter classes to
     * make reading things nicer and simpler.
     */
    public array $aliases = [
        'csrf'          => CSRF::class,
        'toolbar'       => DebugToolbar::class,
        'honeypot'      => Honeypot::class,
        'invalidchars'  => InvalidChars::class,
        'secureheaders' => SecureHeaders::class,
        'FAdmin'        => \App\Filters\FAdmin::class,
        'FUser'         => \App\Filters\FUser::class,
    ];

    /**
     * List of filter aliases that are always
     * applied before and after every request.
     */
    public array $globals = [
        'before' => [
            'FAdmin' => [
                'except' => [
                    '/',
                    'login',
                    'login/*',
                    '/proses_login',
                    'Home',
                    'Home/*',
                    'peta',
                    'about',
                    'artikel',
                    'fitur',
                    'berita',
                    'register/process',
                    'Register',
                    'Register/*',
                    'register/process',
                    'generateToken',

                ]
            ],
        ],
        'after' => [
            'FAdmin' => [
                'except' => [
                    'admin',
                    'admin/*',
                    'Dashboard',
                    'Dashboard/*',
                    'Add_Voucher',
                    'Add_Voucher/*',
                    'AddProduk',
                    'AddUser',
                    'Admin',
                    'Auth',
                    'Home_user',
                    'sampah',
                    'addsampah',
                    'addvoucher',
                    'voucher',
                    'voucher/bumdes',
                    'register/success',
                    'transaction',
                    'transaction/calculate',
                    'form-transaksi',
                    'poin/konversiPoin',
                    'transaksi/hapus/(:num)',
                    'Transaksi',
                    'addproduk',
                    'produk',
                    'user/search',
                    'User/*',
                    'Produk/*',
                    'UserController/*',
                    'user',
                    'Voucher/*',
                    'UserController',
                    'Transaksi/*',
                    'TabelTransaksi/*',
                    'transaction/*',
                    'transaction/calculate',
                    'transaksi/hapus/(:num)',
                    'user/search',
                    'laporan',

                ]
            ]
        ],
        'after' => [
            'FUser' => [
                'except' => [
                    'Home_user',
                    'Home_user/*',
                    'LihatSampah',
                    'LihatSampah/*',
                    'Sampah',
                    'Sampah/*',
                    'Voucher',
                    'Voucher/*',
                    'form-transaksi',
                    'Transaksi',
                    'Transaksi/*',
                    'transaction',
                    'transaction/calculate',
                    'TabelTransaksi',
                    'TabelTransaksi/*',
                    'LihatVoucher',
                    'LihatProduk',
                    'LihatProduk/*',
                    'DetailTransaksi',
                    'DetailTransaksi/*',
                    'DetailVoucher',
                    'DetailVoucher/*',

                ]
            ]
        ],
    ];




    /**
     * List of filter aliases that works on a
     * particular HTTP method (GET, POST, etc.).
     *
     * Example:
     * 'post' => ['foo', 'bar']
     *
     * If you use this, you should disable auto-routing because auto-routing
     * permits any HTTP method to access a controller. Accessing the controller
     * with a method you don’t expect could bypass the filter.
     */
    public array $methods = [];

    /**
     * List of filter aliases that should run on any
     * before or after URI patterns.
     *
     * Example:
     * 'isLoggedIn' => ['before' => ['account/*', 'profiles/*']]
     */
    public array $filters = [];
}
