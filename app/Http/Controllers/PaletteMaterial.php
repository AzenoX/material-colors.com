<?php

namespace App\Http\Controllers;

use App\Models\Palette_Material;

class PaletteMaterial extends Controller
{
    public static function getIndex(){

        $data = Palette_Material::all()->toArray();
        $title = 'Material';
        $defaultColor = 'rgb(239, 83, 80)';

        return view('home', ['data' => $data, 'title' => $title, 'defaultColor' => $defaultColor]);
    }
}
