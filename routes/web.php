<?php

use App\Http\Controllers\ChatController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', [ChatController::class, 'index'])->name('chat.index');
Route::get('/publish', [ChatController::class, 'publish'])->name('chat.publish');
Route::get('/subscribe', [ChatController::class, 'subscribe'])->name('chat.subscribe');