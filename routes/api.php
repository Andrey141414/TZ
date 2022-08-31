<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/
//Реализовать проверку токена +
Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

//Авторизация и регистрация
Route::controller(App\Http\Controllers\authController::class)->group(function () {
    Route::post('/register','register');
    Route::post('/login','login');
    Route::get('/logout','logout')->middleware('auth:sanctum');
});


Route::controller(App\Http\Controllers\userController::class)->group(function () {
    Route::get('get_user','get_user');
    Route::get('get_all_user','get_all_user');
    
    Route::patch('update_user','update_user');
    Route::patch('update_many_user','update_many_user');

    Route::delete('delete_user','delete_user');
    Route::delete('delete_many_user','delete_many_user');
    
});

