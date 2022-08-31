<?php

//use GuzzleHttp\Psr7\Request;

use App\Models\User;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use App\Http\Controllers\userController;
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
    return view('startPage');
});


    Route::get('/register',function () {
        return view('register');
    })->name('register');

    Route::get('/login',function () {
        return view('login');
    })->name('login');


   

