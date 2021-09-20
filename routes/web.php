<?php

use App\Http\Controllers\Site\HomeController;
use App\Http\Controllers\Site\UrlController;
use App\Http\Controllers\Site\CadastrarController;
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

Auth::routes();

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('home', [UrlController::class, 'index'])->name('url.home')->middleware('auth');
Route::get('list/{id}', [UrlController::class, 'show'])->name('url.show')->middleware('auth');
Route::get('url/{id}', [UrlController::class, 'store'])->name('url.update')->middleware('auth');

Route::get('cadastrar', [CadastrarController::class, 'index'])->name('cadastrar.home')->middleware('auth');
Route::post('cadastrar', [CadastrarController::class, 'store'])->name('cadastrar.form')->middleware('auth');

