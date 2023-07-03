<?php

use App\Http\Controllers\SandsMenuController;
use App\Http\Livewire\Menu\Promotion;
use App\Http\Livewire\Menu\Sands\Menu;
use App\Http\Livewire\Menu\Tags;
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

Route::get('/', function () {
    return view('welcome');
});
Route::get('sands/menu',[ SandsMenuController::class, 'sandsPublic'])->name('sands.public');

Route::middleware(['auth:sanctum', config('jetstream.auth_session'),'verified' ])->group(function () {
        Route::get('/dashboard', function () {return view('dashboard');})->name('dashboard');
        // Route::resource('/sands', SandsController::class);
        Route::get('tags', Tags::class)->name('tags.index');
        Route::get('promotions', Promotion::class)->name('promotions');
        Route::get('sands/backend', Menu::class)->name('sands.backend');
    });
