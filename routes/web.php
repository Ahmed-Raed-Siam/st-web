<?php

use Illuminate\Support\Facades\Route;

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
    return view('welcome');
});

Route::get('test', function () {
    echo "<h1>Look here</h1>";
});

Route::get('users/{id?}', function ($id = null) {
    echo "<h1>Users $id</h1>";
    dd('writer number:' . $id);
});

Route::get('users/{id}/comments/', function ($id) {
    echo "<h1>Users $id</h1>";
    dd('publish by user id:' . $id);
});

Route::get('users/{id}/comments/{comment}', function ($id, $comment_id) {
    echo "<h1>Users $id</h1>";
    echo "<h1>Comment $comment_id</h1>";
    dd('Comment number>' . $comment_id . ' publish by user id:' . $id);
});

/*Route::get('blog', function () {
//    dd('blog');
    return redirect()->route('new_blog');
});*/

Route::redirect('blog', 'new_blog', '301');

Route::get('new_blog', function () {
    dd('new_blog');
})->name('my_new_blog');

Route::prefix('admin')->group(function () {


    Route::get('product', function () {
        dd('product');
    });

    Route::get('category', function () {
        dd('category');
    });
});

Route::middleware(['checkIP', 'auth'])->group(function () {
    Route::get('dashboard', function () {
        dd('dashboard');
    });
});

Route::middleware('throttle:3,1')->group(function () {
    Route::get('admin', function () {
        dd('admin dashboard');
    });
});
