<?php

namespace App\Controllers;

class Home extends BaseController
{
    public function index(): string
    {
        // from Routes.php redirect here
        return view('welcome_message');
    }

    // placeholder
    public function listData(){

    }

    // referenced from Routes.php
    public function bookList(){
        return view('book_list');
    }
}
