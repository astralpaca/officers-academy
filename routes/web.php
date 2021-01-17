<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MemoryCardController;

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

Route::get('/memorycards', [MemoryCardController::class, 'show'])->name('memorycard.show');
Route::post('/memorycards', [MemoryCardController::class, 'create'])->name('memorycard.create');
Route::put('/memorycards', [MemoryCardController::class, 'load'])->name('memorycard.load');

Route::get('/campaigns', function() {
    return view('campaigns.show');
})->name('campaigns');
