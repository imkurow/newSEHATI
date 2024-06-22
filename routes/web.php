<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\AuthManager;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ArticleController;

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

Route::get('/Homepage', function () {
    return view('welcome');
})->name('home');

Route::get('/Stresspage', function () {
    return view('stress');
})->name('stresspage');


Route::get('/login', [AuthManager::class, 'login'])->name('login');
Route::post('/login', [AuthManager::class, 'loginPost'])->name('login.post');
Route::get('/registration', [AuthManager::class, 'registration'])->name('registration');
Route::post('/registration', [AuthManager::class, 'registrationPost'])->name('registration.post');

Route::post('/logout', function () {
    Auth::logout();
    request()->session()->invalidate();
    request()->session()->regenerateToken();
    return redirect('/login');
})->name('logout');

// update
Route::middleware(['auth'])->group(function () {
    Route::get('/user', [UserController::class, 'show'])->name('user.show');
    Route::post('/user/update/details', [UserController::class, 'updateUserDetails'])->name('user.update.details');
    Route::post('/user/update/account', [UserController::class, 'updateAccountDetails'])->name('user.update.account');
    Route::post('/user/update/picture', [UserController::class, 'updateProfilePicture'])->name('user.update.picture');
});

// article
Route::get('/articles', [ArticleController::class, 'index'])->name('articles.index');
Route::get('/articles/{id}', [ArticleController::class, 'show'])->name('articles.show');
