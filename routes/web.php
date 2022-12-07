<?php
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminController;



Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [HomeController::class, 'index'])->name('home');

// admin gruops
Route::prefix('admin')->group(function(){

    Route::get('/',function(){
        return view('layouts.admin');
    });

    Route::get('user', [AdminController::class,'index'])->name('view_users');
    Route::get('user/create', [AdminController::class ,'create'])->name('create_user');
    Route::post('user/create/store', [AdminController::class ,'store'])->name('store_user');
    Route::get('user/create/edit/{id}', [AdminController::class ,'edit'])->name('edit_user');
    Route::post('user/create/save/{id}', [AdminController::class ,'update'])->name('save_edit');

});


