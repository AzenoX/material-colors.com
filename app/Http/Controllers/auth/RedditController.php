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

class RedditController extends Controller
{
    public function redirect(): RedirectResponse{
        return Socialite::driver('reddit')
            ->redirect();
    }

    public function handle(){
        if(!session_id()) session_start();

        $user = Socialite::driver('reddit')->user();

        $finduser = User::where('reddit_id', $user->id)->first();

        if($finduser){
            //login
            Auth::login($finduser);

            //redirect
            return redirect()->intended('/');
        }
        else{
            if(User::where('name', $user->nickname)->first()){
                return redirect()->intended('login')->with('status', 'This nickname is already used with another account.');
            }

            $_SESSION['userReddit_nick'] = $user->nickname;
            $_SESSION['userReddit_id'] = $user->id;


            return view('auth.createEmail', ['action' => route('auth_reddit__email_register'), 'provider' => 'Reddit']);

        }
    }


    public function finalizeRegistration(){
        if(!session_id()) session_start();

        $email = htmlspecialchars($_POST['email']);

        if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
            return redirect()->intended('login')->with('status', 'Email incorrect');
        }


        $newUser = User::create([
            'uid' => uniqid(),
            'name' => htmlspecialchars($_SESSION['userReddit_nick']),
            'email' => $email,
            'reddit_id' => htmlspecialchars($_SESSION['userReddit_id']),
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
