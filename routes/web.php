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

Route::get('/', [HomeController::class, '__invoke']);

Route::get('urls', [UrlController::class, 'index']);
Route::get('urls/{slug}', [UrlController::class, 'show']);

Route::get('cadastrar', [CadastrarController::class, 'index']);
Route::post('cadastrar', [CadastrarController::class, 'create']);
