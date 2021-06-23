<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PeliculasController;

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
    return view('auth.login');
});
/*Route::get('/peliculas', function () {
    return view('peliculas');
});
Route::get('/peliculas/create',[PeliculasController::class,'create']);*/
Route::resource('peliculas',PeliculasController::class)->middleware('auth');
Auth::routes(['register'=>false,'reset'=>false]);
Route::get('/home', [PeliculasController::class, 'index'])->name('home');
Route::group(['middleware' => 'auth'], function(){
	Route::get('/', [PeliculasController::class, 'index'])->name('home');
});