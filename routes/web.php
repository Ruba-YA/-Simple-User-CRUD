<?php

use App\Models\Post;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\UserController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
   $posts =  Post::Where('user_id',auth()->id())->get();
    return view('home' , ['posts' => $posts]);
});

Route::post('/register',[UserController::class,'register']);

Route::post('/logout',[UserController::class,'logout']);
Route::post('/login',[UserController::class,'login']);


//Post Routes 
Route::post('/create_post',[ PostController::class,'createPost']);
Route::get('/edit-post/{post}',[PostController::class,'ShowEditScreen']);
Route::put('/edit-post/{post}',[PostController::class,'editPost']);
Route::delete('/delete-post/{post}',[PostController::class,'deletePost']);