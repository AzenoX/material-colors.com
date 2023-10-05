<?php

namespace App\Http\Controllers;

use Illuminate\View\View;

class BlackyController extends Controller
{
    public function index(): View
    {
        return view('blacky');
    }
}
