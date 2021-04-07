<?php

namespace App\Http\Controllers;

use App\Models\Favs_Gradient;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class FavsController extends Controller
{
    /**
     * Add a gradient to favs
     * @param $uid
     * @param $gid
     */
    public static function addGradient($uid, $gid): void
    {
        Favs_Gradient::create(['gradient_id' => $gid, 'user_id' => $uid]);
    }

    /**
     * Remove a gradient from favs
     * @param $uid
     * @param $gid
     */
    public static function remGradient($uid, $gid): void
    {
        Favs_Gradient::whereRaw('user_id = ? AND gradient_id = ?', [$uid, $gid])->delete();
    }


    /**
     * Check if a user has a gradient in his favs
     * @param $uid
     * @param $gid
     * @return bool
     */
    public static function hasGradient($uid, $gid): bool
    {
        $res = Favs_Gradient::whereRaw('user_id = ? AND gradient_id = ?', [$uid, $gid])->get()->toArray();
        if($res)
            return true;
        else
            return false;
    }


    /**
     * Get how many favs a gradient have
     * @param $gid
     * @return mixed
     */
    public static function getCountForGradients()
    {
        $counts = [];

        foreach(Favs_Gradient::all()->toArray() as $gradient){
            $counts[$gradient['gradient_id']] = Favs_Gradient::where('gradient_id', '=', $gradient['gradient_id'])->count();
        }

        return $counts;
    }


    /**
     * Main route
     * @param $uid
     * @param $gid
     * @return string
     */
    public static function addingRoute($uid, $gid): string
    {
        if(empty($gid) || $gid === '')
            exit();

        if(self::hasGradient($uid, $gid)){
            self::remGradient($uid, $gid);
            return 'removed';
        }
        else{
            self::addGradient($uid, $gid);
            return 'added';
        }
    }


    /**
     *Manage profile favs page
     */
    public static function favsPage(){
        $data = Favs_Gradient::where('favs__gradients.user_id', '=', Auth::user()->id)
            ->join('gradients', 'favs__gradients.gradient_id', '=', 'gradients.id')
            ->join('users', 'favs__gradients.user_id', '=', 'users.id')
            ->get()
            ->toArray();
        $favsCount = FavsController::getCountForGradients();

        return view('account.favs', ['data' => $data, 'favsCount' => $favsCount]);
    }
}
