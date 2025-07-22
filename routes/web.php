<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard',[UserController::class,'home'])->middleware(['auth', 'verified'])->name('dashboard');

// Route::get('admin/dashboard',[UserController::class,'index'])->middleware(['auth', 'admin'])->name('admin.dashboard');
Route::prefix('/admin')->middleware(['auth','admin'])->group(function(){
    Route::get('/dashboard',[UserController::class,'index'])->name('admin.dashboard');
    Route::get('/dashboard/post',[UserController::class,'post'])->name('admin.dashboard.post');
    Route::get('/dashboard/create',[UserController::class,'createpost'])->name('admin.dashboard.dashboard.create');
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
