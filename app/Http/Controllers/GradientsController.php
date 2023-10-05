<?php

namespace App\Http\Controllers;

use App\Models\Saved_Gradient;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class GradientsController extends Controller
{
    public static function getIndex()
    {
        $data = DB::table('gradients')
            ->select('users.id', 'gradients.id as gid', 'users.name', 'gradients.gradient_name', 'gradients.angle', 'gradients.colors', 'gradients.favs')
            ->join('users', 'gradients.user_id', '=', 'users.id')
            ->orderBy('gradients.id', 'desc')
            ->get()
            ->toArray();
        if (Auth::guest()) {
            $favsForUser = [];
        } else {
            $favsForUser = DB::table('favs__gradients')
                ->select('gradient_id as gid')
                ->where('user_id', '=', Auth::user()->id)
                ->get()
                ->toArray();
        }
        $favsCount = FavsController::getCountForGradients();

        return view('gradients/gradients', ['data' => $data, 'favs' => $favsForUser, 'favsCount' => $favsCount]);
    }

    public static function getGradientIndex($id)
    {
        $data = DB::table('gradients')
            ->select('users.id as uid', 'gradients.id as gid', 'users.name', 'gradients.gradient_name as gname', 'gradients.angle', 'gradients.colors', 'gradients.favs')
            ->join('users', 'gradients.user_id', '=', 'users.id')
            ->where('gradients.id', '=', $id)
            ->get()
            ->toArray();

        if (Auth::guest()) {
            $favsForUser = [];
        } else {
            $favsForUser = DB::table('favs__gradients')
                ->select('gradient_id as gid')
                ->where('user_id', '=', Auth::user()->id)
                ->get()
                ->toArray();
        }
        $favsCount = FavsController::getCountForGradients();

        return view('gradients/gradient', ['id' => $id, 'data' => $data[0], 'favs' => $favsForUser, 'favsCount' => $favsCount]);
    }

    public static function addGradientToSaved($gid)
    {
        $gradient = Saved_Gradient::create(
            [
                'user_id' => Auth::user()->id,
                'gradient_id' => $gid,
            ]
        );
        $gradient->save();
    }

    public static function removeGradientToSaved($gid)
    {
        Saved_Gradient::whereRaw('user_id = ? AND gradient_id = ?', [Auth::user()->id, $gid])->delete();
    }

    public static function getSavedGradients()
    {
        return Saved_Gradient::where('user_id', '=', Auth::user()->id)->get()->toArray();
    }
}
