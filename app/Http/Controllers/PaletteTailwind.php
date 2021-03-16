<?php

namespace App\Http\Controllers;

use App\Models\Palette_Tailwind;
use Illuminate\Http\Request;

class PaletteTailwind extends Controller
{
    public static function getIndex(){

        $data = Palette_Tailwind::all()->toArray();
        $title = 'Tailwind';

        return view('home', ['data' => $data, 'title' => $title]);
    }
}
