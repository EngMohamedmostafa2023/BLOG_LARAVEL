<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TestController;
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

// Route::get('/test', function () {

//     return ;
// });

// echo TestController::class;
// Route::get('/test',[TestController::class,'test']); // important way
// Route::get('/test',['App\Http\Controllers\TestController','test']);
// Route::get('/test',['App\Http\Controllers\TestController','greet']);
// Route::get('/store',[TestController::class,'create']);
//  method in create relationship between form is controller


// name route
// name route or short cut in routes is very important to use it in blade  and used  every where
Route::get('/BLOG', [TestController::class, 'index'])->name('BLOG.index');
// route uri  static first way  about route dynamic

// route static
Route::get('/posts/create' , [TestController::class , 'create'])->name('posts.create');



Route::post('/posts' , [TestController::class , 'store'])->name('posts.store');

Route::get('/posts/{post}/edit',[TestController::class , 'edit'])->name('posts.edit');
Route::put('/posts/{id}',[TestController::class , 'update'])->name('posts.update');

Route::get('/posts/{id}' , [TestController::class , 'show'])->name('posts.show');

Route::delete('/posts/{post}',[TestController::class , 'destroy'])->name('posts.destroy');


// route dynamic  why  /posts/{id}  because  id is dynamic  and  id is  variable   and  id is  parameter


//  1-  structure change for database (create table  , edit table , delete table , add column , edit column , delete column)
// 1- create table
// 2- edit table
// 3- delete table
// 4- add column
// 5- edit column
// 6- delete column

// 2 - operation on database (insert record , update record  , delete  record , select record)



//
//
 // config file  is very important  why because  every files in framework  laravel

