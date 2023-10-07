<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */

$routes->setAutoRoute(false);



// $routes->get('/', 'Home::userv2');

$routes->get('/crud', 'Crud::index')->setAutoRoute(true);

$routes->get('/admin', 'Home::user');

$routes->get('/', 'OutletController::index');
