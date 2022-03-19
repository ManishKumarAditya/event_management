<?php

use App\Http\Controllers\EventController;
use Illuminate\Console\Scheduling\EventMutex;
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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', [EventController::class, 'index'])->name('event_management');
Route::get('/events', [EventController::class, 'show'])->name('events');

Route::post('/insert_event' , [EventController::class, 'store'])->name('insert_event');
