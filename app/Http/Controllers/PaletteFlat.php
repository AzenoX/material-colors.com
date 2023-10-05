<?php

namespace App\Http\Controllers;

use App\Models\Palette_Flat;
use Illuminate\View\View;

class PaletteFlat extends Controller
{
    public static function getIndex(): View
    {

        $data = Palette_Flat::all()->toArray();
        $title = 'Flat';
        $defaultColor = 'rgb(72, 201, 176)';

        return view('home', ['data' => $data, 'title' => $title, 'defaultColor' => $defaultColor]);
    }
}
