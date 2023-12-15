<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
// when first serving (using spark) you will be redirected to Home.php => index() like below value
$routes->get('/', 'Home::index');

// custom added routes
$routes->add('blog/data', 'Blogs::users/7');
$routes->add('product/(:any)', 'Catalog::productLookup');