<?php

use Illuminate\Support\Facades\Route;

// --------------------------
// Custom Backpack Routes
// --------------------------
// This route file is loaded automatically by Backpack\Base.
// Routes you generate using Backpack\Generators will be placed here.

Route::prefix(config('backpack.base.route_prefix', 'admin'))
    ->middleware(array_merge((array) config('backpack.base.web_middleware', 'web'), (array) config('backpack.base.middleware_key', 'admin')))
    ->group(function () { // custom admin routes
        Route::crud('custom-palettes', 'App\Http\Controllers\Admin\CustomPalettesCrudController');
        Route::crud('gradient', 'App\Http\Controllers\Admin\GradientCrudController');
        Route::crud('socials', 'App\Http\Controllers\Admin\SocialsCrudController');
        Route::crud('user', 'App\Http\Controllers\Admin\UserCrudController');
    }); // this should be the absolute last line of this file
