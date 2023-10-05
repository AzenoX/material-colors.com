<?php

namespace App\Http\Controllers;

use Illuminate\View\View;

class RegisterController extends Controller
{
    public static function getIndex(): View
    {
        return view('register');
    }
}
