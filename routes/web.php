<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;

use App\Http\Livewire\Casts;
use App\Http\Livewire\Critics;
use App\Http\Livewire\Genres;
use App\Http\Livewire\Movies;
use App\Http\Livewire\Profiles;
use App\Http\Livewire\Roles;

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
    return view('master');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// Login
Route::get('/login', [LoginController::class, 'index'])->name('login')->middleware('guest');
Route::post('/login', [LoginController::class, 'authenticate']);
Route::get('/logout', [LoginController::class, 'logout']);

// register
route::get('/register', [RegisterController::class, 'index'])->middleware('guest');
route::post('/register', [RegisterController::class, 'store']);

Route::get('/dashboard', function () {
    return view('backend/dashboard',[
        "title" => "dashboard"
    ]);
})->middleware('auth');

//livewire
Route::get('/cast', Casts::class)->name('cast');
Route::get('/critic',Critics::class)->name('critic');
Route::get('/genre', Genres::class)->name('genre');
Route::get('/movie', Movies::class)->name('movie');
Route::get('/profile', Profiles::class)->name('profile');
Route::get('/role', Roles::class)->name('role');
