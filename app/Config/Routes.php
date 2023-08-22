<?php

namespace Config;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

/*
 * --------------------------------------------------------------------
 * Router Setup
 * --------------------------------------------------------------------
 */
$routes->setDefaultNamespace('App\Controllers');
$routes->setDefaultController('Home');
$routes->setDefaultMethod('index');
$routes->setTranslateURIDashes(false);
$routes->set404Override();
// The Auto Routing (Legacy) is very dangerous. It is easy to create vulnerable apps
// where controller filters or CSRF protection are bypassed.
// If you don't want to define all routes, please use the Auto Routing (Improved).
// Set `$autoRoutesImproved` to true in `app/Config/Feature.php` and set the following to true.
$routes->setAutoRoute(true);

/*
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// We get a performance increase by specifying the default
// route since we don't have to scan directories.
$routes->get('/', 'Home::index');
$routes->get('/about', 'Home::about');
$routes->get('/peta', 'Home::peta');
$routes->get('/fitur', 'Home::fitur');
$routes->get('/artikel', 'Home::artikel');
$routes->get('/berita', 'Home::berita');
$routes->get('/login', 'Home::login');
$routes->get('/register', 'Register::index');
$routes->get('/tampilan_user', 'Home_user::index');
$routes->get('/admin', 'Dashboard::index');
$routes->get('/admin_bumdes', 'Bumdes::index');
$routes->post('/proses_login', 'Login::proses_login');
$routes->post('/register/process', 'Register::process');
$routes->get('/sampah', 'Sampah::index');
$routes->get('/addsampah', 'AddSampah::index');
$routes->get('/addvoucher', 'Add_Voucher::index');
$routes->get('/addvoucher', 'Add_Voucher_bumdes::index');
$routes->get('/voucher', 'Voucher::index');
$routes->get('/voucher_bumdes', 'Voucher_bumdes::index');
$routes->get('/register/success', 'Register::success');
$routes->get('/transaction', 'Transaksi::index');
$routes->post('/transaction/calculate', 'Transaksi::calculate');
$routes->get('/form-transaksi', 'Transaksi::showForm');
$routes->get('/poin/konversiPoin', 'Poin::konversiPoin');
$routes->get('/transaksi/hapus/(:num)', 'Transaksi::hapusTransaksi/$1');
$routes->get('/addproduk', 'AddProduk::index');
$routes->get('/addproduk', 'AddProduk_bumdes::index');
$routes->get('/produk', 'Produk::index');
$routes->get('/produk', 'Produk_bumdes::index');
$routes->get('/user/search', 'UserController::search');
$routes->post('/register/process', 'Register::process');
$routes->get('/user', 'UserController::index');
$routes->get('/user/delete/(:num)', 'UserController::delete/$1');
$routes->get('laporan', 'Laporan::index');
$routes->get('laporan/generateExcel', 'Laporan::generateExcel');
$routes->get('/profile', 'User::profile');
$routes->get('UserController/nonaktifkan/(:num)', 'UserController::nonaktifkan/$1');
$routes->get('UserController/aktifkan/(:num)', 'UserController::aktifkan/$1');
$routes->get('/laporan', 'Transaksi::laporan');
$routes->get('LihatProduk/filterByPrice', 'LihatProduk::filterByPrice');
$routes->get('detail-voucher', 'DetailVoucher::index');






















/*
 * --------------------------------------------------------------------
 * Additional Routing
 * --------------------------------------------------------------------
 *
 * There will often be times that you need additional routing and you
 * need it to be able to override any defaults in this file. Environment
 * based routes is one such time. require() additional route files here
 * to make that happen.
 *
 * You will have access to the $routes object within that file without
 * needing to reload it.
 */
if (is_file(APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php')) {
    require APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php';
}
