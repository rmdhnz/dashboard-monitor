<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'MyAdmin::index');
$routes->get('/data_review', 'MyAdmin::table_review');
$routes->get('/home/(:any)', 'Home::coba/$1');
