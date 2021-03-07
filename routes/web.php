<?php

use App\Http\Controllers\Blog\PostsController as BlogPostsController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoriesController;
use App\Http\Controllers\PostsController;
use App\Http\Controllers\TagsController;
use App\Http\Controllers\UsersController;
use App\Http\Controllers\WelcomeController;

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

Route::get('/', [WelcomeController::class , 'index'])->name('welcome');


Route::get('/blog/posts/{post}', [BlogPostsController::class, 'show'])->name('blog.show');
Route::get('/blog/categories/{category}', [BlogPostsController::class , 'category'])->name('blog.category');
Route::get('/blog/tags/{tag}', [BlogPostsController::class , 'tag'])->name('blog.tag');

Route::get('/home', function () {
    return view('home');
})->middleware('auth')->name('home');

require __DIR__.'/auth.php';


Route::middleware(['auth'])->group(function(){
    
    Route::resource('categories', CategoriesController::class);
    
    Route::resource('posts', PostsController::class);

    Route::resource('tags', TagsController::class);
    
    Route::get('trashed-post', [PostsController::class, 'trashed'])->name('trashed-posts.index');
    
    Route::put('restore-post/{post}', [PostsController::class, 'restore'])->name('posts.restore');

});

Route::middleware(['auth','admin'])->group(function() {
    Route::get('users', [UsersController::class, 'index'])->name('users.index');
    Route::post('users/{user}/make-admin', [UsersController::class, 'makeAdmin'])->name('users.make-admin');
    Route::get('users/{user}/edit', [UsersController::class, 'edit'])->name('users.edit');
    Route::put('users/{user}/update',[UsersController::class, 'update'])->name('users.update');
});

