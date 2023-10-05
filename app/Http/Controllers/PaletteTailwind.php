<?php

namespace App\Http\Controllers;

use Illuminate\View\View;
use App\Models\Palette_Tailwind;

class PaletteTailwind extends Controller
{
    public static function getIndex(): View
    {

        $data = Palette_Tailwind::all()->toArray();
        $title = 'Tailwind';
        $defaultColor = 'rgb(251, 113, 133)';

        return view('home', ['data' => $data, 'title' => $title, 'defaultColor' => $defaultColor]);
    }
}
