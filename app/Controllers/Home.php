<?php

namespace App\Controllers;

class Home extends BaseController
{
    public function index(): string
    {
        return view('home');
    }

    // placeholder
    public function listData(){

    }

    // original ci4 welcome message is placed here
    public function index2(){
        return view('welcome_message');
    }
}
