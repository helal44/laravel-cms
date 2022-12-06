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

    Route::get('user', [AdminController::class,'index']);
    Route::get('user/create', [AdminController::class ,'create']);
    Route::get('user/create/store', [AdminController::class ,'store']);

});


