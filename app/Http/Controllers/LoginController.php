<?php

namespace App\Http\Controllers;

class LoginController extends Controller
{
    public static function getIndex()
    {
        return view('login');
    }
}
