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
Route::get('/palette/bootstrap', [\App\Http\Controllers\PaletteBootstrap::class, 'getIndex'])->name('p_bootstrap');

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

//Route::prefix('admin')->group(function () {
//    Route::get('/addpalette', function () {
//        $colors = [
//            'blue' => [
//                100 => 'CFE2FF',
//                200 => '9EC5FE',
//                300 => '6EA8FE',
//                400 => '3D8BFD',
//                500 => '0D6EFD',
//                600 => '0A58CA',
//                700 => '084298',
//                800 => '052C65',
//                900 => '031633',
//            ],
//            'indigo' => [
//                100 => 'E0CFFC',
//                200 => 'C29FFA',
//                300 => 'A370F7',
//                400 => '8540F5',
//                500 => '6610F2',
//                600 => '520DC2',
//                700 => '3D0A91',
//                800 => '290661',
//                900 => '140330',
//            ],
//            'purple' => [
//                100 => 'E2D9F3',
//                200 => 'C5B3E6',
//                300 => 'A98EDA',
//                400 => '8C68CD',
//                500 => '6F42C1',
//                600 => '59359A',
//                700 => '432874',
//                800 => '2C1A4D',
//                900 => '160D27',
//            ],
//            'pink' => [
//                100 => 'F7D6E6',
//                200 => 'EFADCE',
//                300 => 'E685B5',
//                400 => 'DE5C9D',
//                500 => 'D63384',
//                600 => 'AB296A',
//                700 => '801F4F',
//                800 => '561435',
//                900 => '2B0A1A',
//            ],
//            'red' => [
//                100 => 'F8D7DA',
//                200 => 'F1AEB5',
//                300 => 'EA868F',
//                400 => 'E35D6A',
//                500 => 'DC3545',
//                600 => 'B02A37',
//                700 => '842029',
//                800 => '58151C',
//                900 => '2C0B0E',
//            ],
//            'orange' => [
//                100 => 'FFE5D0',
//                200 => 'FECBA1',
//                300 => 'FEB272',
//                400 => 'FD9843',
//                500 => 'FD7E14',
//                600 => 'CA6510',
//                700 => '984C0C',
//                800 => '653208',
//                900 => '331904',
//            ],
//            'yellow' => [
//                100 => 'FFF3CD',
//                200 => 'FFE69C',
//                300 => 'FFDA6A',
//                400 => 'FFCD39',
//                500 => 'FFC107',
//                600 => 'CC9A06',
//                700 => '997404',
//                800 => '664D03',
//                900 => '332701',
//            ],
//            'green' => [
//                100 => 'D1E7DD',
//                200 => 'A3CFBB',
//                300 => '75B798',
//                400 => '479F76',
//                500 => '198754',
//                600 => '146C43',
//                700 => '0F5132',
//                800 => '0A3622',
//                900 => '051B11',
//            ],
//            'teal' => [
//                100 => 'D2F4EA',
//                200 => 'A6E9D5',
//                300 => '79DFC1',
//                400 => '4DD4AC',
//                500 => '20C997',
//                600 => '1AA179',
//                700 => '13795B',
//                800 => '0D503C',
//                900 => '06281E',
//            ],
//            'cyan' => [
//                100 => 'CFF4FC',
//                200 => '9EEAF9',
//                300 => '6EDFF6',
//                400 => '3DD5F3',
//                500 => '0DCAF0',
//                600 => '0AA2C0',
//                700 => '087990',
//                800 => '055160',
//                900 => '032830',
//            ],
//            'gray' => [
//                100 => 'F8F9FA',
//                200 => 'E9ECEF',
//                300 => 'DEE2E6',
//                400 => 'CED4DA',
//                500 => 'ADB5BD',
//                600 => '6C757D',
//                700 => '495057',
//                800 => '343A40',
//                900 => '212529',
//            ],
//        ];
//
//        $pdo = new PDO('mysql:host=localhost;dbname=material__colors;charset=utf8', env('DB_USERNAME'), env('DB_PASSWORD'),array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
//
//        foreach($colors as $color => $tints){
//            $sql = $pdo->prepare('INSERT INTO palette__bootstraps (name, c100, c200, c300, c400, c500, c600, c700, c800, c900) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)');
//            $sql->execute(array($color, $tints[100], $tints[200], $tints[300], $tints[400], $tints[500], $tints[600], $tints[700], $tints[800], $tints[900]));
//        }
//    });
//});
