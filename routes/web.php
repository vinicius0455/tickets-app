<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\TicketController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});
Route::controller(TicketController::class)->prefix('tickets')->name('tickets')->middleware('auth')->group(function(){
    Route::get('/','index')->name('.index');
    Route::get('/create','create')->name('.create');
    Route::post('/store','store')->name('.store');
    Route::get('/{ticket}/edit','edit')->name('.edit');
    Route::put('/{ticket}/update','update')->name('.update');
    Route::delete('/{ticket}/destroy','destroy')->name('.destroy');
});

require __DIR__.'/auth.php';
