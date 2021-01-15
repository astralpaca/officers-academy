<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SessionController;

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
    return view('overview');
})->name('home');

Route::get('/session', [SessionController::class, 'show'])->name('session.show');
Route::post('/session', [SessionController::class, 'create'])->name('session.create');
Route::put('/session', [SessionController::class, 'load'])->name('session.load');

Route::get('/campaigns', function() {
    return view('campaigns.show');
})->name('campaigns');
