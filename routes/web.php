<?php

use App\Http\Controllers\frontController;
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



Route::get('/', [frontController::class,'index'])->name('front.index');
Route::get('about',[frontController::class,'about'])->name('front.about');
Route::get('/post/{slug}', [frontController::class,'post'])->name('front.post');
Route::get('/author/{slug}',[frontController::class,'author'])->name('front.author');
Route::get('/category/{slug}',[frontController::class,'category'])->name('front.category');
Route::get('/contact',[frontController::class, 'contact'])->name('front.contact');
Route::post('/contact',[frontController::class, 'contactform'])->name('front.contactform');

