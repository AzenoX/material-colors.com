<?php

namespace App\Http\Controllers\auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use DateTime;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Laravel\Socialite\Facades\Socialite;
use Symfony\Component\HttpFoundation\RedirectResponse;

class FacebookController extends Controller
{
    public function redirect(): RedirectResponse
    {
        return Socialite::driver('facebook')
            ->redirect();
    }

    public function handle(): \Illuminate\Http\RedirectResponse
    {
        $user = Socialite::driver('facebook')->user();

        $finduser = User::where('facebook_id', $user->id)->first();

        if ($finduser) {
            //login
            Auth::login($finduser);

            //redirect
            return redirect()->intended('/');
        } else {
            if (User::where('email', $user->email)->first()) {
                return redirect()->intended('login')->with('status', 'This email is already used with another account.');
            }

            $newUser = User::create([
                'uid' => uniqid(),
                'name' => $user->name,
                'email' => $user->email,
                'facebook_id' => $user->id,
                'password' => Hash::make(str_shuffle('pEg3SXFQ@d43gXpAHxHfJ6?p&&@yP4cNRdFSq&@')),
                'email_verified_at' => (new DateTime())->format('Y-m-d H:i:s'),
            ]);
            $newUser->save();

            //login
            Auth::login($newUser);

            //redirect
            return redirect()->intended('/');

        }
    }
}
