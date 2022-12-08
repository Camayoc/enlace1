<?php

use App\Http\Controllers\CompleteLinkController;
use App\Http\Controllers\GoogleController;
use App\Models\User;
use Illuminate\Support\Facades\Route;
use Laravel\Socialite\Facades\Socialite;

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

Route::get('/', function () {
    return view('public');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/link/{enlace}', [App\Http\Controllers\PublicController::class, 'hash'])->name('link');
Route::get('/mylinks', [App\Http\Controllers\LinkController::class, 'index'])->name('link.list');
Route::post('/addlink', [App\Http\Controllers\LinkController::class, 'store'])->name('link.list');

Route::post('completelink', [App\Http\Controllers\HomeController::class, 'completelink']);

Route::prefix('google')->name('google.')->group(function () {
    Route::get('login', [GoogleController::class, 'loginWithGoogle'])->name('login');
    Route::any('callback', [GoogleController::class, 'callbackFromGoogle'])->name('callback');
});

Route::get('/auth/callback/{provider}', function ($provider) {
    $githubUser = Socialite::driver($provider)->user();

    $user = User::updateOrCreate([
        'github_id' => $githubUser->id,
    ], [
        'name' => $githubUser->name,
        'email' => $githubUser->email,
        'github_token' => $githubUser->token,
        'github_refresh_token' => $githubUser->refreshToken,
    ]);

    Auth::login($user);

    return redirect('/dashboard');
});
