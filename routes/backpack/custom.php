<?php

use Illuminate\Support\Facades\Route;

// --------------------------
// Custom Backpack Routes
// --------------------------
// This route file is loaded automatically by Backpack\Base.
// Routes you generate using Backpack\Generators will be placed here.

Route::prefix(config('backpack.base.route_prefix', 'admin'))->middleware(array_merge((array) config('backpack.base.web_middleware', 'web'), (array) config('backpack.base.middleware_key', 'admin')))->middleware(array_merge((array) config('backpack.base.web_middleware', 'web'), (array) config('backpack.base.middleware_key', 'admin')))->group([
    'middleware' => array_merge(
        (array) config('backpack.base.web_middleware', 'web'),
        (array) config('backpack.base.middleware_key', 'admin')
    ), ], function () { // custom admin routes
        Route::crud('custom-palettes', 'CustomPalettesCrudController');
        Route::crud('gradient', 'GradientCrudController');
        Route::crud('socials', 'SocialsCrudController');
        Route::crud('user', 'UserCrudController');
    }); // this should be the absolute last line of this file
