<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;

class SocialController extends Controller
{
    public static function getIndex()
    {

        $socials = DB::table('socials')
            ->select(['name', 'color'])
            ->orderBy('name')
            ->get()
            ->toArray();

        return view('social.social', ['socials' => $socials]);
    }
}
