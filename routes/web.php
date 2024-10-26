<?php
use App\Models\Post;
use App\Models\User;
use App\Models\Video;
use App\Models\Comment;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\VideoController;


Route::get('/', function () {
    return view('welcome');
})->name('home');
Route::resource('videos',VideoController::class);
Route::resource('posts', PostController::class);
// Route::post('/posts/store', [PostController::class, 'store'])->name('posts.store');
Route::post('/posts/{post}/comments', [PostController::class, 'addComment'])->name('posts.addComment');
Route::delete('/posts/delete/{id}', [PostController::class, 'destroyComment'])->name('posts.destroyComment');

Route::post('/videos/{video}/comments', [VideoController::class, 'addComment'])->name('videos.addComment');
Route::delete('/videos/delete/{id}', [VideoController::class, 'destroyComment'])->name('videos.destroyComment');