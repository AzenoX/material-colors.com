<?php

namespace App\Http\Controllers;

use App\Models\Favs_Gradient;
use App\Models\Gradient;
use App\Models\Saved_Gradient;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class VariantsController extends Controller
{
    public function index(){
        return view('variants.variants');
    }
}
