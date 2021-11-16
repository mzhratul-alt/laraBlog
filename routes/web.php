<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HelloController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\StudentController;

Route::get('/', [HelloController::class,'index']);

Route::get('/about', [HelloController::class, 'about']);

Route::get('/hu..hu..ha...haaa', [HelloController::class, 'contact'])->name('contact');

Route::get('post', [PostController::class, 'postIndex']);

Route::get('categories', [HelloController::class, 'categories']);

Route::get('student',[StudentController::class, 'studentIndex'])->name('student');


//Category Crud
Route::post('category/store',[HelloController::class, 'StoreCategory'])->name('store.category');

Route::get('category/view/{id}',[HelloController::class, 'categoryView']);

Route::get('category/edit/{id}',[HelloController::class, 'categoryEdit']);

Route::post('category/update/{id}',[HelloController::class, 'categoryUpdate']);

Route::get('category/delete/{id}',[HelloController::class, 'categoryDelete']);


//Post Crud
Route::post('post/store',[PostController::class, 'postStore']);

Route::get('post/view/{id}',[PostController::class, 'postSingleView']);

Route::get('post/edit/{id}',[PostController::class, 'postEdit']);

Route::post('post/update/{id}', [PostController::class, 'postUpdate']);

Route::get('post/delete/{id}', [PostController::class, 'postDelete']);


//Student
Route::post('student/store',[StudentController::class, 'studentStore'])->name('student.store');
