<?php

namespace App\Http\Controllers;

use Illuminate\View\View;

class LoginController extends Controller
{
    public static function getIndex(): View
    {
        return view('login');
    }
}
