<?php
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\PostController;


Auth::routes();

Route::redirect('/','home');
// show all posts
Route::get('home',[PostController::class,'show_posts']);
// show signal post
Route::get('post/{id}',[PostController::class,'signal_post'])->name('signal_post');
//save comment
Route::post('comment/save/{id}',[CommentController::class,'store'])->name('save_comment');
//Delete comment
Route::get('comment/delete/{id}',[CommentController::class,'destroy'])->name('delete_comment');
// comment staus
Route::get('comment/status/{id}',[CommentController::class,'edit'])->name('comment_status');


// admin sections gruop
Route::prefix('admin')->group(function(){

    Route::get('/',function(){   return view('layouts.admin');   });

    // admin part
    Route::get('user', [AdminController::class,'index'])->name('view_users');
    Route::get('user/create', [AdminController::class ,'create'])->name('create_user');
    Route::post('user/store', [AdminController::class ,'store'])->name('store_user');
    Route::get('user/edit/{id}', [AdminController::class ,'edit'])->name('edit_user');
    Route::post('user/save/{id}', [AdminController::class ,'update'])->name('save_edit');
    Route::get('user/delet/{id}', [AdminController::class ,'destroy'])->name('delete_user');


    //posts part
    Route::get('posts', [PostController::class,'index'])->name('view_posts');
    Route::get('posts/create', [PostController::class,'create'])->name('create_post');

    Route::post('posts/store', [PostController::class,'store'])->name('store_post');

    Route::get('posts/edit/{id}', [PostController::class,'edit'])->name('edit_post');
    Route::post('posts/save/{id}', [PostController::class,'update'])->name('save_post');

    Route::get('posts/delete/{id}', [PostController::class,'destroy'])->name('delete_post');



    // category part

    Route::get('category', [CategoryController::class,'index'])->name('view_category');

    Route::post('category/save', [CategoryController::class,'store'])->name('save_category');

    Route::get('category/delete/{id}', [CategoryController::class,'destroy'])->name('delete_category');


    // comments part
    Route::get('comment',[CommentController::class,'index'])->name('view_comments');

})->middleware('auth','admin');


