<?php

namespace App\Http\Controllers;

use App\Models\Gradient;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class GradientsController extends Controller
{
    public static function getIndex(){

        //$data = Gradient::all()->toArray();
        $data = DB::table('gradients')
            ->select('users.id', 'users.name', 'gradients.gradient_name', 'gradients.angle', 'gradients.colors', 'gradients.favs')
            ->join('users', 'gradients.user_id', '=', 'users.id')
            ->get()
            ->toArray();

        return view('gradients', ['data' => $data]);
    }
}
