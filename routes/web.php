<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HelloController;

Route::get('/', [HelloController::class,'index']);

Route::get('/about', [HelloController::class, 'about']);

Route::get('/hu..hu..ha...haaa', [HelloController::class, 'contact'])->name('contact');

Route::get('createPost', [HelloController::class, 'postCreate']);

Route::get('categories', [HelloController::class, 'categories']);


//Category Crud
Route::post('store/category',[HelloController::class, 'StoreCategory'])->name('store.category');
