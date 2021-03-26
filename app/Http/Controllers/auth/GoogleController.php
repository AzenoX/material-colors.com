<?php

namespace App\Http\Controllers\auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use DateTime;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Laravel\Socialite\Facades\Socialite;
use Symfony\Component\HttpFoundation\RedirectResponse;

class GoogleController extends Controller
{
    public function redirect(): RedirectResponse{
        return Socialite::driver('google')
            ->redirect();
    }


    public function handle(){
        $user = Socialite::driver('google')->user();

        $finduser = User::where('google_id', $user->id)->first();

        if($finduser){
            //login
            Auth::login($finduser);

            //redirect
            return redirect()->intended('/account/home');
        }
        else{
            $newUser = User::create([
                'name' => $user->name,
                'email' => $user->email,
                'google_id' => $user->id,
                'password' => Hash::make(str_shuffle('pEg3SXFQ@d43gXpAHxHfJ6?p&&@yP4cNRdFSq&@')),
                'email_verified_at' => (new DateTime())->format('Y-m-d H:i:s'),
            ]);
            $newUser->save();

            //login
            Auth::login($newUser);

            //redirect
            return redirect()->intended('login');

        }
    }
}
