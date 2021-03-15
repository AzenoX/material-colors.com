<?php

namespace App\Http\Controllers;

use App\Models\Palette_Material;

class PaletteMaterial extends Controller
{
    //
    public static function getIndex(){

        $data = Palette_Material::all()->toArray();

        //dd($data);
        //dd($data['items']['attributes']);

        return view('home', ['data' => $data]);
    }
}
