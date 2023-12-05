<?php

use App\Http\Controllers\OrderController;
use App\Http\Controllers\UserProfileController;
use App\Models\Contacts;
use App\Models\User;
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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/greeting', function () {
    return 'Hello World';
});

// Handling OPTIONS for a resource
Route::options('/resource', function () {
    return response()->json([
        'methods' => ['GET', 'POST', 'PUT', 'DELETE'],
        'headers' => ['Content-Type', 'Authorization'],
    ]);
});

Route::match(['get', 'post'], '/matchMethod', function () {
    if (request()->isMethod('get')) {
        return 'This is a GET request.';
    } elseif (request()->isMethod('post')) {
        return 'This is a POST request.';
    } else {
        return 'This route supports only GET and POST requests.';
    }
});

Route::any('/any', function () {
    return 'This route handles requests with any HTTP method.';
});

Route::get('/dependencyInjection', function (Request $request) {
return $request;
});

Route::get('/user/{id}', function (string $id) {
    return 'User '.$id;
});

//Regular Expression Constraints
Route::get('/category/{category}', function (string $category) {
    return 'Category is '.$category;
})->whereIn('category', ['movie', 'song', 'painting']);

//Naming Routes
Route::get(
    '/profile',
    [UserProfileController::class, 'show']
)->name('profile');

//Route Groups
Route::controller(OrderController::class)->group(function () {
    Route::get('/orders/{id}', 'show');
    Route::get('/orders', 'index');
});

Route::prefix('admin')->group(function () {
    Route::get('/users', static function () {
        return 'Admin Users';
    });
});

//Route Model Binding
Route::get('/contacts/{contact}', function (Contacts $contact) {
    return $contact->email;
});
