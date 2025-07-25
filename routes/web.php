<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ProfileController;

Route::get('/', [UserController::class,'showDataInHome'])->name('home');
Route::get('/fullpost/{id}', [UserController::class,'fullpost'])->name('fullpost');

Route::get('/dashboard',[UserController::class,'home'])->middleware(['auth', 'verified'])->name('dashboard');

// Route::get('admin/dashboard',[UserController::class,'index'])->middleware(['auth', 'admin'])->name('admin.dashboard');
Route::prefix('/admin')->middleware(['auth','admin'])->group(function(){
    Route::get('/dashboard',[UserController::class,'index'])->name('admin.dashboard');
    // Route::get('/dashboard/post',[UserController::class,'post'])->name('admin.dashboard.post');
    // Route::get('/dashboard/create',[UserController::class,'createpost'])->name('admin.dashboard.create');
    Route::get('/dashboard/addpost',[AdminController::class,'addpost'])->name('admin.addpost');
    Route::post('/dashboard/addpost',[AdminController::class,'createpost'])->name('admin.createpost');
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
