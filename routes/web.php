<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\HomeController;

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

// Route::get('/', function () {
//     return view('home');
// });


Route::get('/',[HomeController::class,'index']);
Route::get('/regpage',[HomeController::class,'regpage']);
Route::post('/register',[HomeController::class,'register']);
route::get('/search',[HomeController::class,'search']);
route::get('/city/{city}',[HomeController::class,'city']);
// Route::get('/login',[HomeController::class,'loginpage']);
Route::post('/login',[HomeController::class,'login']);
Route::get('/logout',[HomeController::class,'logout']);
route::get('/user/{id}',[HomeController::class,'user']); 