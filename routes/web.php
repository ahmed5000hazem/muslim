<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProfileController;
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

Route::get('/', [HomeController::class, 'index']);

Route::prefix('/dashboard')->middleware(['auth'])->group(function () {

    Route::get('/', function () { return view('dashboard'); })->name('dashboard');

    Route::get('/profile', [ProfileController::class, "edit"]);
    Route::post('/profile', [ProfileController::class, 'update'])->name('profile.update');
});

// Route::middleware('auth')->group(function () {
//     Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
// });

require __DIR__.'/auth.php';
