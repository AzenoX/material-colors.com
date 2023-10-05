<?php

namespace App\Http\Controllers\account;

use App\Http\Controllers\Controller;
use App\Models\CustomPalettes;
use App\Models\Gradient;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CreateController extends Controller
{
    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public static function gradient()
    {
        return view('account.create_gradient');
    }

    /**
     * @return string
     */
    public static function gradientCreate(Request $request)
    {
        if ($request->get('gname') === 'null' || $request->get('gname') === '') {
            return 'You have to specify a name';
        }

        if ($request->get('colors') === 'null' || $request->get('colors') === '') {
            return 'You have to specify at least 1 color';
        }

        $gname = htmlspecialchars($request->get('gname'));
        $angle = htmlspecialchars($request->get('angle'));
        $colors = json_encode($request->get('colors'));

        $newGradient = Gradient::create([
            'user_id' => Auth::user()->id,
            'gradient_name' => $gname,
            'colors' => $colors,
            'angle' => $angle,
        ]);
        $newGradient->save();

        return ucfirst($gname).' created !';

    }

    public static function custom()
    {
        return view('account.create_custom');
    }

    /**
     * @return string
     */
    public static function customCreate(Request $request)
    {
        if ($request->get('pname') === 'null' || $request->get('pname') === '') {
            return 'You have to specify a name';
        }

        if ($request->get('colors') === 'null' || $request->get('colors') === '') {
            return 'You have to specify at least 1 color';
        }

        $pname = htmlspecialchars($request->get('name'));
        $colors = json_encode($request->get('colors'));

        $newPalette = CustomPalettes::create([
            'uid' => Auth::user()->id,
            'name' => $pname,
            'colors' => json_encode(['colors' => json_decode($colors)]),
        ]);
        $newPalette->save();

        return ucfirst($pname).' created !';

    }
}
