<?php

use App\Http\Controllers\SantriController;
use Illuminate\Support\Facades\Auth;
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
    return redirect('login');
});

Auth::routes();

Route::get('/dashboard', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('data.index', [App\Http\Controllers\SantriController::class, 'index'])->name('data');
Route::post('data.store', [SantriController::class, 'store'])->name('data.store');
Route::post('data.edit', [SantriController::class, 'edit'])->name('data.edit');
Route::post('data.update', [SantriController::class, 'update'])->name('data.update');
Route::post('data.destroy', [SantriController::class, 'destroy'])->name('data.destroy');