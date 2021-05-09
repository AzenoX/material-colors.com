<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
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
                            <div class="flex flex-middle">
                                <svg class="favs_add__btn" data-id="" style="fill: #000" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
                                    <path d="M12 .288l2.833 8.718h9.167l-7.417 5.389 2.833 8.718-7.416-5.388-7.417 5.388 2.833-8.718-7.416-5.389h9.167z"/>
                                </svg>
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
}
