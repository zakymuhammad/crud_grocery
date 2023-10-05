<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */

$routes->setAutoRoute(false);


// $routes->get('/', 'Home::index');

$routes->get('/crud', 'Crud::index')->setAutoRoute(true);

// $routes->get('/register', 'Home::register');

// $routes->get('/grocery', 'Home::grocery')->setAutoRoute(true);

$routes->get('/', 'Home::user');
