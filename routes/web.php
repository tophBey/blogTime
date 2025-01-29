<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DashboardPostController;
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


Route::get('/login',[LoginController::class,'index'])->middleware(['guest'])->name('login');
Route::post('/login',[LoginController::class, 'login']);
Route::post('/logout',[LoginController::class, 'logout']);



Route::get('/register',[LoginController::class,'create'])->middleware(['guest']);;
Route::post('/register',[LoginController::class, 'store']);

Route::get('/dashboard', [DashboardController::class,'index'])->middleware(['auth']);
Route::get('/dashboard/post/createSlug', [DashboardPostController::class,'createSlug'])->middleware(['auth']);
Route::resource('/dashboard/post', DashboardPostController::class)->middleware(['auth']);



Route::fallback(function(){
    
    return view('notfound',[

    ]);
});