<?php

use App\Http\Controllers\Blog\PostController;

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

Route::get('/', 'WelcomeController@index')->name('welcome');
Route::get('blog/posts/{slug}/', [PostController::class,'show'])->name('blog.show');
Route::get('blog/category/{slug}', [PostController::class,'category_show'])->name('blog.category');
Route::get('blog/tag/{slug}', [PostController::class,'tag'])->name('blog.tag');


Auth::routes(['register' => false]);


Route::middleware(['auth'])->group(function() 
{
    Route::get('/home', 'HomeController@index')->name('home');
    Route::get('/backend', 'HomeController@backend')->name('backend');
    Route::resource('categories', 'kategorycontroller');
    Route::resource('tags', 'tagscontroller');
    Route::resource('posts', 'postscontroller'); 
    Route::get('trashed-post','postscontroller@trash')->name('trashed-post.index');
    Route::put('restore-post/{post}','postscontroller@restore')->name('restore-post');
   
});


Route::middleware(['auth', 'admin'])->group(function() {
    Route::resource('users', 'userscontroller'); 
    Route::post('users/{user}make-admin','userscontroller@makeadmin')->name('users.make-admin');
    Route::post('users/{user}make-writer','userscontroller@undoadmin')->name('users.make-writer');
 
});