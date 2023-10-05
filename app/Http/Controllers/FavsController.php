<?php

namespace App\Http\Controllers;

use App\Models\Favs_Gradient;
use App\Models\Favs_Palettes;
use Illuminate\Support\Facades\Auth;

class FavsController extends Controller
{
    /**
     * Add a gradient to favs
     */
    public static function addGradient($uid, $gid): void
    {
        Favs_Gradient::create(['gradient_id' => $gid, 'user_id' => $uid]);
    }

    /**
     * Remove a gradient from favs
     */
    public static function remGradient($uid, $gid): void
    {
        Favs_Gradient::whereRaw('user_id = ? AND gradient_id = ?', [$uid, $gid])->delete();
    }

    /**
     * Check if a user has a gradient in his favs
     */
    public static function hasGradient($uid, $gid): bool
    {
        $res = Favs_Gradient::whereRaw('user_id = ? AND gradient_id = ?', [$uid, $gid])->get()->toArray();
        if ($res) {
            return true;
        } else {
            return false;
        }
    }

    /**
     * Get how many favs a gradient have
     *
     * @param $gid
     * @return mixed
     */
    public static function getCountForGradients()
    {
        $counts = [];

        foreach (Favs_Gradient::all()->toArray() as $gradient) {
            $counts[$gradient['gradient_id']] = Favs_Gradient::where('gradient_id', '=', $gradient['gradient_id'])->count();
        }

        return $counts;
    }

    /**
     * Main route
     */
    public static function addingRoute($uid, $gid): string
    {
        if (empty($gid) || $gid === '') {
            exit();
        }

        if (self::hasGradient($uid, $gid)) {
            self::remGradient($uid, $gid);

            return 'removed';
        } else {
            self::addGradient($uid, $gid);

            return 'added';
        }
    }

    /**
     *Manage profile favs page
     */
    public static function favsPage()
    {
        $data = Favs_Gradient::where('favs__gradients.user_id', '=', Auth::user()->id)
            ->join('gradients', 'favs__gradients.gradient_id', '=', 'gradients.id')
            ->join('users', 'gradients.user_id', '=', 'users.id')
            ->orderBy('gradients.id', 'desc')
            ->get()
            ->toArray();
        $favsCount = FavsController::getCountForGradients();

        return view('account.favs', ['data' => $data, 'favsCount' => $favsCount]);
    }

    /**
     * Add a gradient to favs
     *
     * @param $gid
     */
    public static function addCustoms($uid, $pid): void
    {
        Favs_Palettes::create(['pid' => $pid, 'uid' => $uid]);
    }

    /**
     * Remove a gradient from favs
     *
     * @param $gid
     */
    public static function remCustoms($uid, $pid): void
    {
        Favs_Palettes::whereRaw('uid = ? AND pid = ?', [$uid, $pid])->delete();
    }

    /**
     * Check if a user has a gradient in his favs
     *
     * @param $gid
     */
    public static function hasCustoms($uid, $pid): bool
    {
        $res = Favs_Palettes::whereRaw('uid = ? AND pid = ?', [$uid, $pid])->get()->toArray();
        if ($res) {
            return true;
        } else {
            return false;
        }
    }

    /**
     * Main route
     *
     * @param $gid
     */
    public static function addingRouteCustoms($uid, $pid): string
    {
        if (empty($pid) || $pid === '') {
            exit();
        }

        if (self::hasCustoms($uid, $pid)) {
            self::remCustoms($uid, $pid);

            return 'removed';
        } else {
            self::addCustoms($uid, $pid);

            return 'added';
        }
    }

    /**
     * Get how many favs a gradient have
     *
     * @param $gid
     * @return mixed
     */
    public static function getCountForCustoms()
    {
        $counts = [];

        foreach (Favs_Palettes::all()->toArray() as $palette) {
            $counts[$palette['pid']] = Favs_Palettes::where('pid', '=', $palette['pid'])->count();
        }

        return $counts;
    }
}
