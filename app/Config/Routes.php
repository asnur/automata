<?php

namespace Config;

session();
// Create a new instance of our RouteCollection class.
$routes = Services::routes();

// Load the system's routing file first, so that the app and ENVIRONMENT
// can override as needed.
if (file_exists(SYSTEMPATH . 'Config/Routes.php')) {
	require SYSTEMPATH . 'Config/Routes.php';
}

/**
 * --------------------------------------------------------------------
 * Router Setup
 * --------------------------------------------------------------------
 */
$routes->setDefaultNamespace('App\Controllers');
$routes->setDefaultController('Home');
$routes->setDefaultMethod('index');
$routes->setTranslateURIDashes(false);
$routes->set404Override();
$routes->setAutoRoute(true);

/**
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// We get a performance increase by specifying the default
// route since we don't have to scan directories.

$routes->get('/', 'Home::index');
$routes->delete('/pelanggan/(:any)', 'Admin::hapus_pelanggan/$1');
$routes->delete('/pendaftaran/(:any)', 'Admin::hapus_pendaftaran/$1');
$routes->delete('/barang/(:any)', 'Admin::hapus_barang/$1');
$routes->delete('/foto/(:any)', 'Admin::hapus_foto/$1');
$routes->delete('/penjualan/(:any)', 'Admin::hapus_penjualan/$1');
$routes->delete('/penyewaan/(:any)', 'Admin::hapus_penyewaan/$1');
$routes->put('/verif_pendaftaran', 'Admin::verifikasi_pendaftaran');


/**
 * --------------------------------------------------------------------
 * Additional Routing
 * --------------------------------------------------------------------
 *
 * There will often be times that you need additional routing and you
 * need to it be able to override any defaults in this file. Environment
 * based routes is one such time. require() additional route files here
 * to make that happen.
 *
 * You will have access to the $routes object within that file without
 * needing to reload it.
 */
if (file_exists(APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php')) {
	require APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php';
}
