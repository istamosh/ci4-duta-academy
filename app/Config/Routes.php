<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
// when first serving (using spark) you will be redirected to Home.php => index() like below value
//$routes->get('/', 'Home::index');
// redirect to book_list
$routes->get('/', 'Home::bookList');

// custom added routes for custom addresses
// if you want to access localhost:port/book page and redirects to Book class with bookList() function you should add 2 args
// example: $routes->add('book', 'Book::bookList')
// if there are no defined function, then by default using index() function
$routes->add('blog/data', 'Blogs::users/7');
$routes->add('product/(:any)', 'Catalog::productLookup');
$routes->add('book', 'Book');