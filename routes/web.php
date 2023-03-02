<?php

use App\Models\Post;
use App\Models\Category;
use App\Models\User;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\DB;
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
    // Log query - Aufrufe
//    DB::listen(function($query) {
//        logger($query->sql, $query->bindings);
//    });
    return view('posts', [
        'posts' => Post::latest()->with('category', 'author')->get()
    ]);
});

Route::get('posts/{post}', function(Post $post) {
    return view('post')->with([
        'post' => $post
    ]);
});
Route::get('categories/{category:slug}', function(Category $category) {
    return view('posts', [
        'posts' => $category->posts->load(['category', 'author'])
    ]);
});
Route::get('authors/{author:username}', function(User $author) {
    return view('posts', [
        'posts' => $author->posts->load(['category', 'author'])
    ]);
});
