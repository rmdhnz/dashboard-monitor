<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'MyAdmin::index');
$routes->get('/data_review', 'MyAdmin::table_review');
$routes->get('/home/(:any)', 'Home::coba/$1');
$routes->get('/laporan', 'MyAdmin::laporan', ['filter' => 'role:headadmin,admin']);
$routes->get('tambah-cabang', 'MyAdmin::tambah_cabang', ['filter' => 'role:headadmin']);
$routes->post('save_cabang', 'MyAdmin::save_cabang', ['filter' => 'role:headadmin']);
$routes->get('/edit/(:num)', 'MyAdmin::edit/$1', ['filter' => 'role:headadmin']);
$routes->post('/update/(:num)', 'MyAdmin::update/$1', ['filter' => 'role:headadmin']);
$routes->get('cabang', 'MyAdmin::cabang', ['filter' => 'role:headadmin']);
$routes->delete('delete/(:num)', 'MyAdmin::delete/$1', ['filter' => 'role:headadmin']);
$routes->get('/akun', 'MyAdmin::akun', ['filter' => 'role:headadmin']);
$routes->get('/tambah-akun', 'MyAdmin::tambah_akun', ['filter' => 'role:headadmin']);

// antrian core
$routes->get('/antrian', 'Antrian::index');
$routes->get('/teller', 'Antrian::teller_call', ['filter' => 'role:teller']);
$routes->get('/cs', 'Antrian::cs_call', ['filter' => 'role:customer_service']);
$routes->post('/antrian_save', 'Antrian::antrian_save');
$routes->post('/teller_call_update', 'Antrian::teller_call_update');
$routes->post('/cs_call_update', 'Antrian::cs_call_update');
