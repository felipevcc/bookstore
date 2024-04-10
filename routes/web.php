<?php

use App\Http\Controllers\BookController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
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

Auth::routes();
Route::get('/', [BookController::class, 'index']);


// Routes for authenticated users, otherwise return to login
Route::group(['middleware' => ['auth']], function () {
	// View after being authenticated
	Route::get('/home', [HomeController::class, 'index'])->name('home');

	Route::group(['prefix' => 'users', 'middleware' => ['role:admin']], function () {
		Route::get('/', [UserController::class, 'index'])->name('users.index');
		Route::get('/create', [UserController::class, 'create'])->name('users.create');
		Route::post('/', [UserController::class, 'store'])->name('users.store');
		Route::get('/{user}/edit', [UserController::class, 'edit'])->name('users.edit');
		Route::put('/{user}', [UserController::class, 'update'])->name('users.update');
		Route::delete('/{user}', [UserController::class, 'destroy'])->name('users.destroy');
	});
});
