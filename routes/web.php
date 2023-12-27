<?php

use App\Http\Controllers\ClubController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;

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


Route::get('/clubsuser', [ClubController::class, 'homepage'])->name('clubsuser_hariz.homepage');


Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/product', [ProductController::class, 'index'])->name('Products.index');
    Route::get('/product/create', [ProductController::class, 'create'])->name('Products.create');
    Route::post('/product', [ProductController::class, 'store'])->name('Products.store');
    Route::get('/product/{product}/edit', [ProductController::class, 'edit'])->name('Products.edit');
    Route::put('/product/{product}/update', [ProductController::class, 'update'])->name('Products.update');
    Route::delete('/product/{product}/destroy', [ProductController::class, 'destroy'])->name('Products.destroy');
    
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');


    Route::get('/clubadmin', [ClubController::class, 'index'])->name('clubs.index');
    Route::get('/clubadmin/create', [ClubController::class, 'create'])->name('clubs.create');
    Route::post('/clubadmin', [ClubController::class, 'store'])->name('clubs.store');
    Route::get('/clubadmin/{club}/edit', [ClubController::class, 'edit'])->name('clubs.edit');
    Route::put('/clubadmin/{club}/update', [ClubController::class, 'update'])->name('clubs.update');
    Route::delete('/clubadmin/{club}/destroy', [ClubController::class, 'destroy'])->name('clubs.destroy');
});

require __DIR__.'/auth.php';
