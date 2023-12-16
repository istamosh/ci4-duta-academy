<?php
    namespace App\Controllers;

    class Book extends BaseController {
        public function index() {
            return view('book_list');
        }
    }
    // custom controllers for books
    // flow goes from Routes -> this -> said file inside app\Views\ dir.
?>