<?php

namespace Config;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

// Load the system's routing file first, so that the app and ENVIRONMENT
// can override as needed.
if (file_exists(SYSTEMPATH . 'Config/Routes.php'))
{
	require SYSTEMPATH . 'Config/Routes.php';
}

/**
 * --------------------------------------------------------------------
 * Router Setup
 * --------------------------------------------------------------------
 */
$routes->setDefaultNamespace('App\Controllers');
$routes->setDefaultController('Auth');
$routes->setDefaultMethod('index');
$routes->setTranslateURIDashes(false);
$routes->set404Override();
$routes->setAutoRoute(true);

/*
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// We get a performance increase by specifying the default
// route since we don't have to scan directories.

//Autentifikasi login
$routes->get('/', 'Auth::index');
$routes->get('/dashboard', 'Dashboard::index',['filter' => 'authfilter']);


//Bagian
$routes->get('/bagian/edit/(:segment)', 'Bagian::edit/$1');
$routes->delete('/bagian/(:num)', 'Bagian::delete/$1');
$routes->get('/bagian/delete/(:any)', 'Bagian::index/$1');

//Pengguna
$routes->get('/pengguna/edit/(:segment)', 'Pengguna::edit/$1');
$routes->delete('/pengguna/(:num)', 'Pengguna::delete/$1');
$routes->get('/pengguna/delete/(:any)', 'Pengguna::index/$1');
$routes->get('/pengguna/detail/(:num)', 'Pengguna::detail/$1');

//Profil
$routes->get('/profile/edit/(:segment)', 'Profile::edit/$1');

// Surat Masuk
$routes->get('/sm/edit/(:segment)', 'Sm::edit/$1');
$routes->delete('/sm/(:num)', 'Sm::delete/$1');
$routes->get('/sm/delete/(:any)', 'Sm::index/$1');
$routes->get('/sm/detail/(:num)', 'Sm::detail/$1');
$routes->get('/sm/cetak_disposisi/(:num)', 'Sm::cetak_disposisi/$1');

// Surat Keluar
$routes->get('/sk/edit/(:segment)', 'Sk::edit/$1');
$routes->delete('/sk/(:num)', 'Sk::delete/$1');
$routes->get('/sk/delete/(:any)', 'Sk::index/$1');
$routes->get('/sk/detail/(:num)', 'Sk::detail/$1');

//Laporan Surat Masuk
$routes->get('/rekapsm/data_sm', 'Rekapsm::index');

//Laporan Surat Masuk
$routes->get('/rekapsk/data_sk', 'Rekapsk::index');
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
if (file_exists(APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php'))
{
	require APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php';
}
