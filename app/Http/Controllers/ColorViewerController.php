<?php

namespace App\Http\Controllers;

use App\Models\CustomPalettes;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\View\View;

class ColorViewerController extends Controller
{
    public static function showHex(): View
    {
        return view('viewer.hex');
    }

    public static function showRgb(): View
    {
        return view('viewer.rgb');
    }

    public static function showHsl(): View
    {
        return view('viewer.hsl');
    }
}
