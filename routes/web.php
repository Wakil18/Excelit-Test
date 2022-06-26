<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;

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
//     return view('welcome');
// });

Route::get('/', function () {
    return view('signup');
});




// Route::prefix('/profile')->group(function(){
//     // Route::get('/view', [UserController::class, ''])->name('all.category');
//     Route::post('/update', [UserController::class, 'update'])->name('update');
// });


Route::group(['prefix' => '/profile', 'as' => 'profile.'], function(){
    Route::post('/update', [UserController::class, 'update'])->name('update');
});
