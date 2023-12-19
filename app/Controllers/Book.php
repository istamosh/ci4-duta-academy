<?php
    namespace App\Controllers;

    class Book extends BaseController {
        public function index() {
            return view('book_list');
        }
        public function insert() {
            return view('insert_new');
        }
    }
    // custom controllers for books
    // flow goes from Routes -> this -> said file inside app\Views\ dir.
?>