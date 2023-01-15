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

Route::get('/', function () {
    return view('welcome');
});

Route::group(['middleware' => []], function () {

    // Usuarios
    Route::get('/users', [UserController::class, 'index'])->name('users.index');
    Route::get('/users/show/{id}', [UserController::class, 'show'])->name('users.show');
    Route::get('/users/edit/{id}', [UserController::class, 'edit'])->name('users.edit');
    Route::put('/users/update/{id}', [UserController::class, 'update'])->name('users.update');
    Route::post('/users/destroy/{id}', [UserController::class, 'destroy'])->name('users.destroy');
    Route::get('/users/new', [UserController::class, 'create'])->name('users.create');
    Route::post('/users/store', [UserController::class, 'store'])->name('users.store');

});
