<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use App\Models\Number_plate;
use App\Models\Comment;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use thiagoalessio\TesseractOCR\TesseractOCR;

use App\Http\Controllers\HomeController;
use App\Http\Controllers\DetailController;
use App\Http\Controllers\NewEventController;
use App\Http\Controllers\EventDetailController;
use App\Http\Controllers\MonthlyEventController;
use App\Http\Controllers\WeeklyEventController;

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

Route::get('/', [HomeController::class, 'home_get'])->name('home');

// Route::get('detail/', [DetailController::class, 'detail'])->name('detail');

Route::get('/newevent', [NewEventController::class, 'event_get']);
Route::post('/newevent', [NewEventController::class, 'event_post']);

Route::get('/event_detail/{id}', [EventDetailController::class, 'event_detail_get']);
Route::post('/event_detail/{id}', [EventDetailController::class, 'event_detail_post']);

Route::get('/monthly_events', [MonthlyEventController::class, 'monthly_events']);

Route::get('/weekly_events', [WeeklyEventController::class, 'weekly_events']);

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');
