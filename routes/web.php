<?php

use App\Http\Controllers\Admin\ContactController;
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
Route::post('/contact', [HomeController::class, 'getInTouch']);

Route::prefix('/dashboard')->middleware(['auth'])->group(function () {

    Route::get('/', function () { return view('dashboard'); })->name('dashboard');

    Route::get('/profile', [ProfileController::class, "edit"])->name('profile');
    
    Route::prefix('/contact')->group(function () {
        Route::get('/', [ContactController::class, 'index'])->name('admin.contact');
        Route::get('/{message}', [ContactController::class, 'show'])->name('admin.contact.show');
    });
});

require __DIR__.'/auth.php';
