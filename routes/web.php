<?php

use App\Http\Controllers\UserController;
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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/greeting', function () {
    return 'Hello World';
});

Route::get('/user', [UserController::class, 'index']);

Route::redirect('/welcome', '/user');

Route::view('/showName', 'showName', ['name' => 'Taylor']);

Route::middleware('throttle:60,1')->group(function () {
    Route::get('/exampleUser', [UserController::class, 'index']);
});

Route::fallback(function () {
    return view('welcome');
});
