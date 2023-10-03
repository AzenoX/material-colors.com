<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BlackyController extends Controller
{
    public function index(){
        return view('blacky');
    }
}
