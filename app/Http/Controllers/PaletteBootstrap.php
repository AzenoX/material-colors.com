<?php

namespace App\Http\Controllers;

use App\Models\Palette_Bootstrap;
use Illuminate\View\View;

class PaletteBootstrap extends Controller
{
    public static function getIndex(): View
    {

        $data = Palette_Bootstrap::all()->toArray();
        $title = 'Bootstrap';
        $defaultColor = 'rgb(13, 110, 253)';

        return view('home', ['data' => $data, 'title' => $title, 'defaultColor' => $defaultColor, 'hide50' => true]);
    }
}
