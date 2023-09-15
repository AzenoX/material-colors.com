<?php

namespace App\Http\Controllers;

use App\Models\CustomPalettes;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ApiController extends Controller
{
    public static function getSocialColors($name = ''){
        $name = htmlspecialchars($name);

        if (preg_match('/[\'^£$%&*()}{@#~?><>,|=_+¬-]/', $name)) return '';

        if(!$name || $name === ''){
            $socials = DB::table('socials')
                ->select(['name', 'color'])
                ->orderBy('name')
                ->get()
                ->toArray();
        }
        else{
            $socials = DB::table('socials')
                ->select(['name', 'color'])
                ->where('name', 'like', '%'.$name.'%')
                ->orderBy('name')
                ->get()
                ->toArray();
        }

        $html = '';
        foreach($socials as $social){
            $html .= '
                <div class="social" style="background: ' . $social->color . ';">
                    <div class="social_content">
                        <div class="social_content_header">
                            <div class="flex flex-col">
                                <p class="social_content_header__title">' . ucfirst($social->name) . '</p>
                                <p class="">' . $social->color . '</p>
                            </div>
                        </div>
                        <div class="social_content_body" style="background: ' . $social->color . '">
                            <a class="btnBotRight btnCopy" data-copy="' . $social->color . '">
                                <span class="btnBotRight__text montserrat">Copy</span>
                            </a>
                        </div>
                    </div>
                </div>
            ';
        }

        return $html;
    }


    public static function getCustomsColors($name = ''){
        $name = htmlspecialchars($name);

        if (preg_match('/[\'^£$%&*()}{@#~?><>,|=_+¬-]/', $name)) return '';

        if(!$name || $name === ''){
            $palettes = DB::table('custom_palettes')
                ->select(['id', 'name', 'uid', 'colors'])
                ->orderBy('name')
                ->get()
                ->toArray();
        }
        else{
            $palettes = DB::table('custom_palettes')
                ->select(['id', 'name', 'uid', 'colors'])
                ->where('name', 'like', '%'.$name.'%')
                ->orderBy('name')
                ->get()
                ->toArray();
        }

        $html = '';
        foreach($palettes as $palette){

            $user = \App\Models\User::where('id', '=', $palette->uid)->get()->toArray()[0];

            //Get and parse colors
            $colors = json_decode($palette->colors)->colors;


            if(Auth::guest()){
                $favsForUser = [];
            }
            else{
                $favsForUser = DB::table('favs__palettes')
                    ->select('pid')
                    ->where('uid', '=', Auth::user()->id)
                    ->get()
                    ->toArray();
            }
            $favsCount = FavsController::getCountForCustoms();


            $favorites = [];
            foreach($favsForUser as $i => $f){
                array_push($favorites, $f->pid);
            }

            $hasColor = '#2196f3';



            if((!Auth::guest()) && (Auth::user()->id == $palette->uid)){
                $author = '<strong>You</strong>';
            }
            else{
                $author = $user['name'];
            }


            if((!Auth::guest()) && (Auth::user()->id == $palette->uid)){
                $button = '
                    <a class="btn btn-red btn-small delete-info btn-botrightabs" href="'.route('account.my_customs__delete', ['id' => $palette->id, 'route' => urlencode('customs')]).'">
                        <span class="btn__icon">
                            <svg fill="#fff" xmlns="http://www.w3.org/2000/svg" width="19" height="19" viewBox="0 0 24 24">
                                <path d="M3 6v18h18v-18h-18zm5 14c0 .552-.448 1-1 1s-1-.448-1-1v-10c0-.552.448-1 1-1s1 .448 1 1v10zm5 0c0 .552-.448 1-1 1s-1-.448-1-1v-10c0-.552.448-1 1-1s1 .448 1 1v10zm5 0c0 .552-.448 1-1 1s-1-.448-1-1v-10c0-.552.448-1 1-1s1 .448 1 1v10zm4-18v2h-20v-2h5.711c.9 0 1.631-1.099 1.631-2h5.315c0 .901.73 2 1.631 2h5.712z"/>
                            </svg>
                        </span>
                    </a>
                ';
            }
            else{
                $button = '
                    <svg class="favs_add__btn" data-id="'.$palette->id.'" style="fill: '.((in_array($palette->id, $favorites)) ? $hasColor : '#000').'" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
                        <path d="M12 .288l2.833 8.718h9.167l-7.417 5.389 2.833 8.718-7.416-5.388-7.417 5.388 2.833-8.718-7.416-5.389h9.167z" style="pointer-events: none;"/>
                    </svg>
&nbsp;<span>'.($favsCount[$palette->id] ?? 0).'</span>
                ';
            }


            $divs = '';
            foreach($colors as $color){
                $divs .= '<div style="background: '.$color->color.';"></div>';
            }



            $html .= '
                <div class="custom" style="background: '.$colors[0]->color.';">
                    <div class="custom_content">
                        <div class="custom_content_header">
                            <div>
                                <p class="custom_content_header__title">'.ucfirst($palette->name).'</p>
                                <!--<p class="custom_content_header__author">By '.$author.'</p>-->
                            </div>
                            <!--<div class="flex flex-middle">
                                '.$button.'
                            </div>-->
                            <a class="btn" href="'.(route('customs.custom', ['id' => $palette->id])).'">
                                <span aria-hidden="true" class="btn__left" style="background: '.$colors[0]->color.';"></span>
                                <span class="btn__text montserrat">View</span>
                                <span aria-hidden="true" class="btn__right" style="background: '.$colors[0]->color.';"></span>
                            </a>
                        </div>
                        <div class="custom_content_body">
                            '.$divs.'
                        </div>
                    </div>
                </div>
            ';
        }

        return $html;
    }
}
