<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RegisterController extends Controller
{
    public static function getIndex(){
        return view('register');
    }
}
