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

class TwitterController extends Controller
{
    public function redirect(): RedirectResponse{
        return Socialite::driver('twitter')
            ->redirect();
    }


    public function handle(){
        $preUser = Socialite::driver('twitter')->user();

        $token = $preUser->token;
        $tokenSecret = $preUser->tokenSecret;

        $user = Socialite::driver('twitter')->userFromTokenAndSecret($token, $tokenSecret);

        $finduser = User::where('twitter_id', $user->id)->first();

        if($finduser){
            //login
            Auth::login($finduser);

            //redirect
            return redirect()->intended('/account/home');
        }
        else{
            if(User::where('email', $user->getEmail())->first()){
                return redirect()->intended('login')->with('status', 'This email is already used with another account.');
            }

            $newUser = User::create([
                'uid' => uniqid(),
                'name' => $user->getNickname(),
                'email' => $user->getEmail(),
                'twitter_id' => $user->getId(),
                'password' => Hash::make(str_shuffle('pEg3SXFQ@d43gXpAHxHfJ6?p&&@yP4cNRdFSq&@')),
                'email_verified_at' => (new DateTime())->format('Y-m-d H:i:s'),
            ]);
            $newUser->save();

            //login
            Auth::login($newUser);

            //redirect
            return redirect()->intended('/account/home');

        }
    }
}
