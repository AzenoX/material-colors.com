<?php

namespace App\Http\Controllers;

use App\Models\Gradient;
use Illuminate\Http\Request;

class GradientsController extends Controller
{
    public static function getIndex(){

        $data = Gradient::all()->toArray();

        return view('gradients', ['data' => $data]);
    }
}
