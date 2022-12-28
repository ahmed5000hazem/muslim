<?php

use App\Http\Controllers\Admin\ArtWorkController;
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

    Route::prefix('work')->group(function () {
        Route::get('/', [ArtWorkController::class, 'index'])->name('admin.work');
        Route::get('/create', [ArtWorkController::class, 'create'])->name('admin.work.create');
        Route::get('/edit/{work}', [ArtWorkController::class, 'edit'])->name('admin.work.edit');
    });
    
    Route::prefix('/contact')->group(function () {
        Route::get('/', [ContactController::class, 'index'])->name('admin.contact');
        Route::get('/{message}', [ContactController::class, 'show'])->name('admin.contact.show');
    });
});

require __DIR__.'/auth.php';
