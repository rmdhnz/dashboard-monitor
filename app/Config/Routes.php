<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'MyAdmin::index');
$routes->get('/data_review', 'MyAdmin::table_review');
$routes->get('/home/(:any)', 'Home::coba/$1');

$routes->group('antri', function ($routes) {
    $routes->get('/', 'Antrian::index');
    $routes->get('/teller_call', 'Antrian::teller_call');
    $routes->get('/cs', 'Antrian::cs');
});
