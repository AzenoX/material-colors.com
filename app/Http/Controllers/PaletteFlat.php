<?php

namespace App\Http\Controllers;

use App\Models\Palette_Flat;
use Illuminate\Http\Request;

class PaletteFlat extends Controller
{
    public static function getIndex(){

        $data = Palette_Flat::all()->toArray();
        $title = 'Flat';

        return view('home', ['data' => $data, 'title' => $title]);
    }
}
