<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

/*=======================================
*       Palettes
=======================================*/
Route::get('/', [\App\Http\Controllers\PaletteMaterial::class, 'getIndex'])->name('home');
Route::get('/palette/tailwind', [\App\Http\Controllers\PaletteTailwind::class, 'getIndex'])->name('p_tailwind');
Route::get('/palette/flat', [\App\Http\Controllers\PaletteFlat::class, 'getIndex'])->name('p_flat');

/*=======================================
*       Favorites
=======================================*/
Route::get('/favs/add/gradient/{uid}/{gid?}', [\App\Http\Controllers\FavsController::class, 'addingRoute'])->name('favs_add');
Route::get('/favs/add/customs/{uid}/{pid?}', [\App\Http\Controllers\FavsController::class, 'addingRouteCustoms'])->name('favs_add_customs');

/*=======================================
*       Gradients
=======================================*/
Route::get('/gradients', [\App\Http\Controllers\GradientsController::class, 'getIndex'])->name('gradients');
Route::get('/gradient/{id}', [\App\Http\Controllers\GradientsController::class, 'getGradientIndex'])->name('gradient');

/*=======================================
*       Social Colors
=======================================*/
Route::get('/social', [\App\Http\Controllers\SocialController::class, 'getIndex'])->name('social');

/*=======================================
*       Variants
=======================================*/
Route::get('/variants', [\App\Http\Controllers\VariantsController::class, 'index'])->name('variants');

/*=======================================
*       AI Routes
=======================================*/
Route::get('/ai/tinttest', [\App\Http\Controllers\Ai\TintTestController::class, 'show'])->name('tinttest');
Route::post('/ai/tinttest', [\App\Http\Controllers\Ai\TintTestController::class, 'tintColor'])->name('tinttest-post');

/*=======================================
*       Custom Palettes
=======================================*/
Route::get('/customs', [\App\Http\Controllers\CustomController::class, 'getIndex'])->name('customs.customs');
Route::get('/custom/{id}', [\App\Http\Controllers\CustomController::class, 'getCustomIndex'])->name('customs.custom');

/*=======================================
*       Social Colors
=======================================*/
Route::get('/blacky', function () {
    return view('blacky');
})->name('blacky');

/*=======================================
*       Account
=======================================*/
Route::get('/account/home', function () {
    return view('account.home');
})->name('account.home')->middleware(['auth', 'verified']);
Route::get('/account/settings', function () {
    return view('account.settings');
})->name('account.settings')->middleware(['auth', 'verified']);
Route::get('/account/favs', [\App\Http\Controllers\FavsController::class, 'favsPage'])->name('account.favs')->middleware(['auth', 'verified']);

Route::get('/account/createGradient', [\App\Http\Controllers\account\CreateController::class, 'gradient'])->name('account.create_gradient')->middleware(['auth', 'verified']);
Route::post('/account/createGradient', [\App\Http\Controllers\account\CreateController::class, 'gradientCreate'])->name('account.create_gradient_post')->middleware(['auth', 'verified']);

Route::get('/account/createPalette', [\App\Http\Controllers\account\CreateController::class, 'custom'])->name('account.create_custom')->middleware(['auth', 'verified']);
Route::post('/account/createPalette', [\App\Http\Controllers\account\CreateController::class, 'customCreate'])->name('account.create_custom_post')->middleware(['auth', 'verified']);

Route::get('/account/gradients', [\App\Http\Controllers\account\AccountController::class, 'my_gradients'])->name('account.my_gradients')->middleware(['auth', 'verified']);

Route::get('/account/gradients/delete/{id}/{route}', [\App\Http\Controllers\account\AccountController::class, 'my_gradients__delete'])->name('account.my_gradients__delete')->middleware(['auth', 'verified']);

Route::get('/account/customs/delete/{id}/{route}', [\App\Http\Controllers\account\AccountController::class, 'my_customs__delete'])->name('account.my_customs__delete')->middleware(['auth', 'verified']);

/*=======================================
*       APIs
=======================================*/
Route::get('/api/social/{name?}', [\App\Http\Controllers\ApiController::class, 'getSocialColors']);
Route::get('/api/customs/{name?}', [\App\Http\Controllers\ApiController::class, 'getCustomsColors']);

/*=======================================
*       OAuth Routes
=======================================*/
/*github*/
Route::get('/auth/github/redirect', [\App\Http\Controllers\auth\GithubController::class, 'redirect'])->name('auth_github__redirect');
Route::get('/auth/github/callback', [\App\Http\Controllers\auth\GithubController::class, 'handle'])->name('auth_github__callback');

/*google*/
Route::get('/auth/google/redirect', [\App\Http\Controllers\auth\GoogleController::class, 'redirect'])->name('auth_google__redirect');
Route::get('/auth/google/callback', [\App\Http\Controllers\auth\GoogleController::class, 'handle'])->name('auth_google__callback');

/*facebook*/
Route::get('/auth/facebook/redirect', [\App\Http\Controllers\auth\FacebookController::class, 'redirect'])->name('auth_facebook__redirect');
Route::get('/auth/facebook/callback', [\App\Http\Controllers\auth\FacebookController::class, 'handle'])->name('auth_facebook__callback');

/*twitter*/
Route::get('/auth/twitter/redirect', [\App\Http\Controllers\auth\TwitterController::class, 'redirect'])->name('auth_twitter__redirect');
Route::get('/auth/twitter/callback', [\App\Http\Controllers\auth\TwitterController::class, 'handle'])->name('auth_twitter__callback');

/*reddit*/
Route::get('/auth/reddit/redirect', [\App\Http\Controllers\auth\RedditController::class, 'redirect'])->name('auth_reddit__redirect');
Route::get('/auth/reddit/callback', [\App\Http\Controllers\auth\RedditController::class, 'handle'])->name('auth_reddit__callback');
Route::get('/auth/reddit/email', function () {
    return redirect()->intended();
});
Route::post('/auth/reddit/email', [\App\Http\Controllers\auth\RedditController::class, 'finalizeRegistration'])->name('auth_reddit__email_register');

/*spotify*/
Route::get('/auth/spotify/redirect', [\App\Http\Controllers\auth\SpotifyController::class, 'redirect'])->name('auth_spotify__redirect');
Route::get('/auth/spotify/callback', [\App\Http\Controllers\auth\SpotifyController::class, 'handle'])->name('auth_spotify__callback');
Route::get('/auth/spotify/email', function () {
    return redirect()->intended();
});
Route::post('/auth/spotify/email', [\App\Http\Controllers\auth\SpotifyController::class, 'finalizeRegistration'])->name('auth_spotify__email_register');

/*deezer*/
Route::get('/auth/deezer/redirect', [\App\Http\Controllers\auth\DeezerController::class, 'redirect'])->name('auth_deezer__redirect');
Route::get('/auth/deezer/callback', [\App\Http\Controllers\auth\DeezerController::class, 'handle'])->name('auth_deezer__callback');

Route::prefix('admin')->group(function () {
    Route::get('/addpalette', function () {
        //        $colors_tailwind = [
        //            'rose' => [
        //                50 => 'fff1f2',
        //                100 => 'ffe4e6',
        //                200 => 'fecdd3',
        //                300 => 'fda4af',
        //                400 => 'fb7185',
        //                500 => 'f43f5e',
        //                600 => 'e11d48',
        //                700 => 'be123c',
        //                800 => '9f1239',
        //                900 => '881337',
        //            ],
        //            'pink' => [
        //                50 => 'fdf2f8',
        //                100 => 'fce7f3',
        //                200 => 'fbcfe8',
        //                300 => 'f9a8d4',
        //                400 => 'f472b6',
        //                500 => 'ec4899',
        //                600 => 'db2777',
        //                700 => 'be185d',
        //                800 => '9d174d',
        //                900 => '831843',
        //            ],
        //            'fuchsia' => [
        //                50 => 'fdf4ff',
        //                100 => 'fae8ff',
        //                200 => 'f5d0fe',
        //                300 => 'f0abfc',
        //                400 => 'e879f9',
        //                500 => 'd946ef',
        //                600 => 'c026d3',
        //                700 => 'a21caf',
        //                800 => '86198f',
        //                900 => '701a75',
        //            ],
        //            'purple' => [
        //                50 => 'faf5ff',
        //                100 => 'f3e8ff',
        //                200 => 'e9d5ff',
        //                300 => 'd8b4fe',
        //                400 => 'c084fc',
        //                500 => 'a855f7',
        //                600 => '9333ea',
        //                700 => '7e22ce',
        //                800 => '6b21a8',
        //                900 => '581c87',
        //            ],
        //            'violet' => [
        //                50 => 'f5f3ff',
        //                100 => 'ede9fe',
        //                200 => 'ddd6fe',
        //                300 => 'c4b5fd',
        //                400 => 'a78bfa',
        //                500 => '8b5cf6',
        //                600 => '7c3aed',
        //                700 => '6d28d9',
        //                800 => '5b21b6',
        //                900 => '4c1d95',
        //            ],
        //            'indigo' => [
        //                50 => 'eef2ff',
        //                100 => 'e0e7ff',
        //                200 => 'c7d2fe',
        //                300 => 'a5b4fc',
        //                400 => '818cf8',
        //                500 => '6366f1',
        //                600 => '4f46e5',
        //                700 => '4338ca',
        //                800 => '3730a3',
        //                900 => '312e81',
        //            ],
        //            'blue' => [
        //                50 => 'eff6ff',
        //                100 => 'dbeafe',
        //                200 => 'bfdbfe',
        //                300 => '93c5fd',
        //                400 => '60a5fa',
        //                500 => '3b82f6',
        //                600 => '2563eb',
        //                700 => '1d4ed8',
        //                800 => '1e40af',
        //                900 => '1e3a8a',
        //            ],
        //            'light_blue' => [
        //                50 => 'f0f9ff',
        //                100 => 'e0f2fe',
        //                200 => 'bae6fd',
        //                300 => '7dd3fc',
        //                400 => '38bdf8',
        //                500 => '0ea5e9',
        //                600 => '0284c7',
        //                700 => '0369a1',
        //                800 => '075985',
        //                900 => '0c4a6e',
        //            ],
        //            'cyan' => [
        //                50 => 'ecfeff',
        //                100 => 'cffafe',
        //                200 => 'a5f3fc',
        //                300 => '67e8f9',
        //                400 => '22d3ee',
        //                500 => '06b6d4',
        //                600 => '0891b2',
        //                700 => '0e7490',
        //                800 => '155e75',
        //                900 => '164e63',
        //            ],
        //            'teal' => [
        //                50 => 'f0fdfa',
        //                100 => 'ccfbf1',
        //                200 => '99f6e4',
        //                300 => '5eead4',
        //                400 => '2dd4bf',
        //                500 => '14b8a6',
        //                600 => '0d9488',
        //                700 => '0f766e',
        //                800 => '115e59',
        //                900 => '134e4a',
        //            ],
        //            'emerald' => [
        //                50 => 'ecfdf5',
        //                100 => 'd1fae5',
        //                200 => 'a7f3d0',
        //                300 => '6ee7b7',
        //                400 => '34d399',
        //                500 => '10b981',
        //                600 => '059669',
        //                700 => '047857',
        //                800 => '065f46',
        //                900 => '064e3b',
        //            ],
        //            'green' => [
        //                50 => 'f0fdf4',
        //                100 => 'dcfce7',
        //                200 => 'bbf7d0',
        //                300 => '86efac',
        //                400 => '4ade80',
        //                500 => '22c55e',
        //                600 => '16a34a',
        //                700 => '15803d',
        //                800 => '166534',
        //                900 => '14532d',
        //            ],
        //            'lime' => [
        //                50 => 'f7fee7',
        //                100 => 'ecfccb',
        //                200 => 'd9f99d',
        //                300 => 'bef264',
        //                400 => 'a3e635',
        //                500 => '84cc16',
        //                600 => '65a30d',
        //                700 => '4d7c0f',
        //                800 => '3f6212',
        //                900 => '365314',
        //            ],
        //            'yellow' => [
        //                50 => 'fefce8',
        //                100 => 'fef9c3',
        //                200 => 'fef08a',
        //                300 => 'fde047',
        //                400 => 'facc15',
        //                500 => 'eab308',
        //                600 => 'ca8a04',
        //                700 => 'a16207',
        //                800 => '854d0e',
        //                900 => '713f12',
        //            ],
        //            'amber' => [
        //                50 => 'fffbeb',
        //                100 => 'fef3c7',
        //                200 => 'fde68a',
        //                300 => 'fcd34d',
        //                400 => 'fbbf24',
        //                500 => 'f59e0b',
        //                600 => 'd97706',
        //                700 => 'b45309',
        //                800 => '92400e',
        //                900 => '78350f',
        //            ],
        //            'orange' => [
        //                50 => 'fff7ed',
        //                100 => 'ffedd5',
        //                200 => 'fed7aa',
        //                300 => 'fdba74',
        //                400 => 'fb923c',
        //                500 => 'f97316',
        //                600 => 'ea580c',
        //                700 => 'c2410c',
        //                800 => '9a3412',
        //                900 => '7c2d12',
        //            ],
        //            'red' => [
        //                50 => 'fef2f2',
        //                100 => 'fee2e2',
        //                200 => 'fecaca',
        //                300 => 'fca5a5',
        //                400 => 'f87171',
        //                500 => 'ef4444',
        //                600 => 'dc2626',
        //                700 => 'b91c1c',
        //                800 => '991b1b',
        //                900 => '7f1d1d',
        //            ],
        //            'warm_gray' => [
        //                50 => 'fafaf9',
        //                100 => 'f5f5f4',
        //                200 => 'e7e5e4',
        //                300 => 'd6d3d1',
        //                400 => 'a8a29e',
        //                500 => '78716c',
        //                600 => '57534e',
        //                700 => '44403c',
        //                800 => '292524',
        //                900 => '1c1917',
        //            ],
        //            'true_gray' => [
        //                50 => 'fafafa',
        //                100 => 'f5f5f5',
        //                200 => 'e5e5e5',
        //                300 => 'd4d4d4',
        //                400 => 'a3a3a3',
        //                500 => '737373',
        //                600 => '525252',
        //                700 => '404040',
        //                800 => '262626',
        //                900 => '171717',
        //            ],
        //            'gray' => [
        //                50 => 'fafafa',
        //                100 => 'f4f4f5',
        //                200 => 'e4e4e7',
        //                300 => 'd4d4d8',
        //                400 => 'a1a1aa',
        //                500 => '71717a',
        //                600 => '52525b',
        //                700 => '3f3f46',
        //                800 => '27272a',
        //                900 => '18181b',
        //            ],
        //            'cool_gray' => [
        //                50 => 'f9fafb',
        //                100 => 'f3f4f6',
        //                200 => 'e5e7eb',
        //                300 => 'd1d5db',
        //                400 => '9ca3af',
        //                500 => '6b7280',
        //                600 => '4b5563',
        //                700 => '374151',
        //                800 => '1f2937',
        //                900 => '111827',
        //            ],
        //            'blue_gray' => [
        //                50 => 'f8fafc',
        //                100 => 'f1f5f9',
        //                200 => 'e2e8f0',
        //                300 => 'cbd5e1',
        //                400 => '94a3b8',
        //                500 => '64748b',
        //                600 => '475569',
        //                700 => '334155',
        //                800 => '1e293b',
        //                900 => '0f172a',
        //            ]
        //        ];
        //        $colors_flat = [
        //            'turquoise' => [
        //                50 => 'e8f8f5',
        //                100 => 'd1f2eb',
        //                200 => 'a3e4d7',
        //                300 => '76d7c4',
        //                400 => '48c9b0',
        //                500 => '1abc9c',
        //                600 => '15967d',
        //                700 => '10715e',
        //                800 => '0a4b3e',
        //                900 => '05261f',
        //            ],
        //            'greensea' => [
        //                50 => 'e8f6f3',
        //                100 => 'd0ece7',
        //                200 => 'a2d9ce',
        //                300 => '73c6b6',
        //                400 => '45b39d',
        //                500 => '16a085',
        //                600 => '12806a',
        //                700 => '0d6050',
        //                800 => '094035',
        //                900 => '04201b',
        //            ],
        //            'emerald' => [
        //                50 => 'eafaf1',
        //                100 => 'd5f5e3',
        //                200 => 'abebc6',
        //                300 => '82e0aa',
        //                400 => '58d68d',
        //                500 => '2ecc71',
        //                600 => '25a35a',
        //                700 => '1c7a44',
        //                800 => '12522d',
        //                900 => '092917',
        //            ],
        //            'nephritis' => [
        //                50 => 'e9f7ef',
        //                100 => 'd4efdf',
        //                200 => 'a9dfbf',
        //                300 => '7dcea0',
        //                400 => '52be80',
        //                500 => '27ae60',
        //                600 => '1f8b4d',
        //                700 => '17683a',
        //                800 => '104626',
        //                900 => '082313',
        //            ],
        //            'sun_flower' => [
        //                50 => 'fef9e7',
        //                100 => 'fcf3cf',
        //                200 => 'f9e79f',
        //                300 => 'f7dc6f',
        //                400 => 'f4d03f',
        //                500 => 'f1c40f',
        //                600 => 'c19d0c',
        //                700 => '917609',
        //                800 => '604e06',
        //                900 => '302703',
        //            ],
        //            'orange' => [
        //                50 => 'fef5e7',
        //                100 => 'fdebd0',
        //                200 => 'fad7a0',
        //                300 => 'f8c471',
        //                400 => 'f5b041',
        //                500 => 'f39c12',
        //                600 => 'c27d0e',
        //                700 => '925e0b',
        //                800 => '613e07',
        //                900 => '311f04',
        //            ],
        //            'carrot' => [
        //                50 => 'fdf2e9',
        //                100 => 'fae5d3',
        //                200 => 'f5cba7',
        //                300 => 'f0b27a',
        //                400 => 'eb984e',
        //                500 => 'e67e22',
        //                600 => 'b8651b',
        //                700 => '8a4c14',
        //                800 => '5c320e',
        //                900 => '2e1907',
        //            ],
        //            'alizarin' => [
        //                50 => 'fdedec',
        //                100 => 'fadbd8',
        //                200 => 'f5b7b1',
        //                300 => 'f1948a',
        //                400 => 'ec7063',
        //                500 => 'e74c3c',
        //                600 => 'b93d30',
        //                700 => '8b2e24',
        //                800 => '5c1e18',
        //                900 => '2e0f0c',
        //            ],
        //            'pomegranate' => [
        //                50 => 'f9ebea',
        //                100 => 'f2d7d5',
        //                200 => 'e6b0aa',
        //                300 => 'd98880',
        //                400 => 'cd6155',
        //                500 => 'c0392b',
        //                600 => '9a2e22',
        //                700 => '73221a',
        //                800 => '4d1711',
        //                900 => '260b09',
        //            ],
        //            'peter_river' => [
        //                50 => 'ebf5fb',
        //                100 => 'd6eaf8',
        //                200 => 'aed6f1',
        //                300 => '85c1e9',
        //                400 => '5dade2',
        //                500 => '3498db',
        //                600 => '2a7aaf',
        //                700 => '1f5b83',
        //                800 => '153d58',
        //                900 => '0a1e2c',
        //            ],
        //            'belize_hole' => [
        //                50 => 'eaf2f8',
        //                100 => 'd4e6f1',
        //                200 => 'a9cce3',
        //                300 => '7fb3d5',
        //                400 => '5499c7',
        //                500 => '2980b9',
        //                600 => '216694',
        //                700 => '194d6f',
        //                800 => '10334a',
        //                900 => '081a25',
        //            ],
        //            'amethyst' => [
        //                50 => 'f5eef8',
        //                100 => 'ebdef0',
        //                200 => 'd7bde2',
        //                300 => 'c39bd3',
        //                400 => 'af7ac5',
        //                500 => '9b59b6',
        //                600 => '7c4792',
        //                700 => '5d356d',
        //                800 => '3e2449',
        //                900 => '1f1224',
        //            ],
        //            'wisteria' => [
        //                50 => 'f4ecf7',
        //                100 => 'e8daef',
        //                200 => 'd2b4de',
        //                300 => 'bb8fce',
        //                400 => 'a569bd',
        //                500 => '8e44ad',
        //                600 => '72368a',
        //                700 => '552968',
        //                800 => '391b45',
        //                900 => '1c0e23',
        //            ],
        //            'wet_asphalt' => [
        //                50 => 'ebedef',
        //                100 => 'd6dbdf',
        //                200 => 'aeb6bf',
        //                300 => '85929e',
        //                400 => '5d6d7e',
        //                500 => '34495e',
        //                600 => '2a3a4b',
        //                700 => '1f2c38',
        //                800 => '151d26',
        //                900 => '0a0f13',
        //            ],
        //            'midnight_blue' => [
        //                50 => 'eaecee',
        //                100 => 'd5d8dc',
        //                200 => 'abb2b9',
        //                300 => '808b96',
        //                400 => '566573',
        //                500 => '2c3e50',
        //                600 => '233240',
        //                700 => '1a2530',
        //                800 => '121920',
        //                900 => '090c10',
        //            ],
        //            'clouds' => [
        //                50 => 'ecf0f1',
        //                100 => 'd4d8d9',
        //                200 => 'bdc0c1',
        //                300 => 'a5a8a9',
        //                400 => '8e9091',
        //                500 => '767879',
        //                600 => '5e6060',
        //                700 => '474848',
        //                800 => '2f3030',
        //                900 => '181818',
        //            ],
        //            'silver' => [
        //                50 => 'bdc3c7',
        //                100 => 'aab0b3',
        //                200 => '979c9f',
        //                300 => '84898b',
        //                400 => '717577',
        //                500 => '5f6264',
        //                600 => '4c4e50',
        //                700 => '393a3c',
        //                800 => '262728',
        //                900 => '131314',
        //            ],
        //            'concrete' => [
        //                50 => 'f4f6f6',
        //                100 => 'eaeded',
        //                200 => 'd5dbdb',
        //                300 => 'bfc9ca',
        //                400 => 'aab7b8',
        //                500 => '95a5a6',
        //                600 => '778485',
        //                700 => '596364',
        //                800 => '3c4242',
        //                900 => '1e2121',
        //            ],
        //            'asbestos' => [
        //                50 => 'f2f4f4',
        //                100 => 'e5e8e8',
        //                200 => 'ccd1d1',
        //                300 => 'b2babb',
        //                400 => '99a3a4',
        //                500 => '7f8c8d',
        //                600 => '667071',
        //                700 => '4c5455',
        //                800 => '333838',
        //                900 => '191c1c',
        //            ],
        //        ];
        //
        //
        //        $pdo = new PDO('mysql:host=localhost;dbname=material__colors;charset=utf8','admin','xKdp6byELAo7TH8GbsX',array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
        //
        //
        //        foreach($colors_flat as $color => $tints){
        //            $sql = $pdo->prepare('INSERT INTO palette__flat (name, c50, c100, c200, c300, c400, c500, c600, c700, c800, c900) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)');
        //            $sql->execute(array($color, $tints[50], $tints[100], $tints[200], $tints[300], $tints[400], $tints[500], $tints[600], $tints[700], $tints[800], $tints[900]));
        //        }
    });
});
