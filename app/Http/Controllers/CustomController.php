<?php

namespace App\Http\Controllers;

use App\Models\CustomPalettes;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\View\View;

class CustomController extends Controller
{
    public static function getIndex(): View
    {
        if (Auth::guest()) {
            $favsForUser = [];
        } else {
            $favsForUser = DB::table('favs__palettes')
                ->select('pid')
                ->where('uid', '=', Auth::user()->id)
                ->get()
                ->toArray();
        }
        $favsCount = FavsController::getCountForCustoms();

        $palettes = CustomPalettes::all()->toArray();

        return view('palettes.customs', ['palettes' => $palettes, 'favs' => $favsForUser, 'favsCount' => $favsCount]);
    }

    public static function getCustomIndex($id): View
    {
        $palette = CustomPalettes::where('id', '=', $id)->get()->toArray()[0];
        $user = User::where('id', '=', $palette['uid'])->get()->toArray()[0];

        return view('palettes.custom', ['palette' => $palette, 'user' => $user]);
    }
}
