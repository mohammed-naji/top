<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        return 'Home Page';
    }

    public function user($user = '')
    {
        return 'User ' .$user;
    }
}

// Resource Controller
