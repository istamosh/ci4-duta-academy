<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
// when first serving (using spark) you will be redirected to Home.php => index() like below value
//$routes->get('/', 'Home::index');
// redirect to home
$routes->get('/', 'Home');

// custom added routes for custom addresses
// if you want to access localhost:port/book page and redirects to Book class with bookList() function you should add 2 args
// example: $routes->add('book', 'Book::bookList')
// if there are no defined function, then by default using index() function
//$routes->add('blog/data', 'Blogs::users/7');
//$routes->add('product/(:any)', 'Catalog::productLookup');
// makes localhost/book is designated at Book.php
$routes->add('book', 'Book');
$routes->add('home', 'Home');
$routes->add('/book/new', 'Book::formInsert');
// adding edit book routes derived from book_list.php
$routes->add('/book/edit', 'Book::update');
// adding database updating process (from update_book.php)
$routes->add('/book/execute_update', 'Book::executeUpdate');

// CRUD operations
// derived from form_insert.php
$routes->post('create-book', 'Book::save');
// from book_list.php
$routes->post('delete-book', 'Book::delete');