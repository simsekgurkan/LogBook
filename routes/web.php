<?php

use App\Http\Controllers\frontController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\PostController;
use Illuminate\Support\Facades\Route;

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

//Web Routes

Route::get('/', [frontController::class,'index'])->name('front.index');
Route::get('about',[frontController::class,'about'])->name('front.about');
Route::get('/post/{slug}', [frontController::class,'post'])->name('front.post');
Route::get('/author/{slug}',[frontController::class,'author'])->name('front.author');
Route::get('/category/{slug}',[frontController::class,'category'])->name('front.category');
Route::get('/contact',[frontController::class, 'contact'])->name('front.contact');
Route::post('/contact',[frontController::class, 'contactform'])->name('front.contactform');

//Admin Panel Routes



Route::middleware('auth')->group(function (){
    Route::get('/admin/dashboard',[PostController::class,'dashboard'])->name('admin.dashboard');
    Route::get('/admin/',[PostController::class,'dashboard'])->name('admin.dashboard');

    Route::get('/admin/posts',[PostController::class,'index'])->name('posts.index');
    Route::get('/admin/my-posts',[PostController::class,'myposts'])->name('posts.myposts');
    Route::get('/admin/posts/trashed-posts',[PostController::class,'trashed'])->name('posts.trashed');
    Route::get('admin/posts/soft-delete/{id}',[PostController::class, 'destroy'])->name('posts.soft-delete');
    Route::get('admin/posts/delete/{id}',[PostController::class, 'forceDelete'])->name('posts.delete');
    Route::get('admin/posts/recover/{id}',[PostController::class, 'recover'])->name('posts.recover');
    Route::get('/admin/posts/create',[PostController::class,'create'])->name('posts.create');
    Route::post('/admin/posts/store',[PostController::class,'store'])->name('posts.store');
    Route::get('/admin/posts/edit/{id}',[PostController::class,'edit'])->name('posts.edit');
    Route::put('/admin/posts/update/{id}',[PostController::class,'update'])->name('posts.update');
});




Route::get('/admin/register',[LoginController::class,'registerform'])->name('registerform');
Route::post('/admin/logout',[LoginController::class,'logout'])->name('logout');
Route::get('/admin/login',[LoginController::class,'index'])->name('loginform');
Route::post('/admin/login',[LoginController::class,'login'])->name('login');




