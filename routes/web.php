<?php

use App\Models\User;
use App\Models\Category;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\DashboardController;

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
    return view('home', ['title' => 'home']);
});
Route::get('/about', function () {
    return view('about', ['title' => 'about']);
});


Route::get('/posts', [PostController::class, 'index']);
Route::get('/posts/{post:slug}', [PostController::class, 'show'])->name('mypost.show');

Route::get('/categories/{category:slug}', function (Category $category) {
    return view('posts.index', [
        'title' => "Post by Category: $category->name ",
        'posts' => $category->posts,
        'category' => $category->name,
        'categories' => Category::all()
    ]);
});

Route::get('/authors/{author:username}', function (User $author) {
    return view('posts.index', [
        'title' => "Post by Author : $author->name",
        'posts' => $author->posts,
        'categories' => Category::all()

    ]);
});

Route::get('/login', [LoginController::class, 'index'])->name('login')->middleware('guest');

//perlindungan dari brute force.set dulu di app/Providers/RouteServiceProvider.php -> Rate limiter
Route::post('/login', [LoginController::class, 'authenticate'])->middleware('throttle:login');

Route::post('/logout', [LoginController::class, 'logout']);

Route::get('/register', [RegisterController::class, 'index']);
Route::post('/register', [RegisterController::class, 'store']);
Route::get('/dashboard', function () {
    return view('dashboard.index', [
        'title' => 'dashboard'
    ]);
})->middleware('auth');


Route::get('/dashboard/posts/checkSlug', [DashboardController::class, 'checkSlug']);
Route::resource('/dashboard/posts', DashboardController::class)->middleware('auth');
Route::resource('/comments', CommentController::class);
