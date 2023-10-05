<?php

namespace App\Http\Controllers;

use Illuminate\View\View;

class VariantsController extends Controller
{
    public function index(): View
    {
        return view('variants.variants');
    }
}
