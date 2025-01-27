<?php

use App\Http\Controllers\LoginController;
use App\Http\Controllers\PostController;
use App\Models\Category;
use App\Models\User;
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

Route::get('/', function () {
    return view('home', [
        'title' => 'home'
    ]);
});

Route::get('/about', function () {
    return view('about', [
        'title' => 'about'
    ]);
});

Route::get('/posts', [PostController::class, 'index']);
Route::get('/posts/{post:slug}',[PostController::class, 'show']);


Route::get('/categories', function(){
    return view('categories', [
        'title'=> 'Posts Categories',
        'categories' => Category::all()
    ]);
});
Route::get('/categories/{category:slug}', function (Category $category) {
    return view('posts', [
        'subtitle' => 'Post By Category '. $category->name,
        'title'=> $category->name,
        'posts' => $category->posts->load('category','author'),
    ]);
});


Route::get('/author/{author:username}', function(User $author) {
    return view('posts', [
        'subtitle' => 'Post By Category '. $author->name,
        'title'=> 'User Post',
        'posts' => $author->posts->load('category','author')
    ]);
});


Route::get('/login',[LoginController::class,'index']);
Route::post('/login',[LoginController::class, 'login']);


Route::get('/register',[LoginController::class,'create']);
Route::post('/register',[LoginController::class, 'store']);

Route::get('/dashboard', function(){
    return view('dasboard',[
        'title' => ''

    ]);
});


Route::fallback(function(){
    
    return view('/notfound',[

    ]);
});