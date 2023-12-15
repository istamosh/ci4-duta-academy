<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
// when first serving (using spark) you will be redirected to home::index like below value
$routes->get('/', 'Home::index');
