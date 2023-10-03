<?php

namespace App\Http\Controllers\account;

use App\Http\Controllers\Controller;
use App\Http\Controllers\FavsController;
use App\Models\CustomPalettes;
use App\Models\Gradient;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class AccountController extends Controller
{
    public static function my_gradients(){
        $data = DB::table('gradients')
            ->select('users.id', 'gradients.id as gid', 'users.name', 'gradients.gradient_name', 'gradients.angle', 'gradients.colors', 'gradients.favs')
            ->join('users', 'gradients.user_id', '=', 'users.id')
            ->where('users.id' , '=', Auth::user()->id)
            ->orderBy('gradients.id', 'desc')
            ->get()
            ->toArray();

        return view('account.my_gradients', ['data' => $data]);
    }

    public static function my_gradients__delete($id, $route){
        $gradient = Gradient::select('*')
            ->where('id', '=', $id);

        $gradient->delete();

        return redirect(str_replace('-', '/', urldecode($route)));
    }

    public static function my_customs__delete($id, $route){
        $gradient = CustomPalettes::select('*')
            ->where('id', '=', $id);

        $gradient->delete();

        return redirect(str_replace('-', '/', urldecode($route)));
    }
}
