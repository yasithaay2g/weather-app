<?php

use App\Http\Controllers\TemperatureController;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

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
    return Inertia::render('Welcome', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
    ]);
});


Route::middleware(['auth', 'verified'])->group(function () {
    
Route::get('/dashboard', [TemperatureController::class, "index"])->name('dashboard');
Route::get('/temperature-order', [TemperatureController::class, "hottestFirst"])->name('temperature.order');
Route::get('/temperature-reset', [TemperatureController::class, "resetOrder"])->name('temperature.order.reset');
});
require __DIR__.'/auth.php';