<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\LogoutController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ThreadController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\UserProfileController;


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
    $threads = App\Models\Thread::paginate(15);
    return view('home', compact('threads'));
    
})->name('home');

// Log in routes
Route::get('/login', [LoginController::class, 'index'])->name('login');
Route::post('/login', [LoginController::class, 'store']);

// Log out route
Route::post('/logout', [LogoutController::class, 'store'])->name('logout');

// Register routes
Route::get('/register', [RegisterController::class, 'index'])->name('register');
Route::post('/register', [RegisterController::class, 'store']);

// Thread routes
Route::get('/thread', [ThreadController::class, 'index'])->name('thread.index');
Route::get('/thread/create', [ThreadController::class, 'create'])->name('thread.create')->middleware('auth');
Route::post('/thread', [ThreadController::class, 'store'])->name('thread.store')->middleware('auth');
Route::get('/thread/{thread}/edit', [ThreadController::class, 'edit'])->name('thread.edit')->middleware('auth');
Route::get('/thread/{thread}', [ThreadController::class, 'show'])->name('thread.show');
Route::put('/thread/{thread}', [ThreadController::class, 'update'])->name('thread.update')->middleware('auth');
Route::delete('/thread/{thread}', [ThreadController::class, 'destroy'])->name('thread.destroy')->middleware('auth');
Route::post('/thread/{thread}/like', [ThreadController::class, 'like'])->name('thread.like')->middleware('auth');
Route::delete('/thread/{thread}/unlike', [ThreadController::class, 'unlike'])->name('thread.unlike')->middleware('auth');


// Comment routes
Route::post('comment/create/{thread}', [CommentController::class, 'addThreadComment'])->name('threadcomment.store')->middleware('auth');
Route::put('comment/{comment}', [CommentController::class, 'updateThreadComment'])->name('threadcomment.update')->middleware('auth');
Route::delete('comment/{comment}', [CommentController::class, 'deleteThreadComment'])->name('threadcomment.destroy')->middleware('auth');
Route::post('/comment/{comment}/like', [CommentController::class, 'likeThreadComment'])->name('threadcomment.like')->middleware('auth');
Route::delete('/comment/{comment}/unlike', [CommentController::class, 'unlikeThreadComment'])->name('threadcomment.unlike')->middleware('auth');

// Comment reply routes
Route::post('reply/create/{comment}', [CommentController::class, 'addReplyComment'])->name('replycomment.store')->middleware('auth');
Route::put('reply/{comment}', [CommentController::class, 'updateReplyComment'])->name('replycomment.update')->middleware('auth');
Route::delete('reply/{comment}', [CommentController::class, 'deleteReplyComment'])->name('replycomment.destroy')->middleware('auth');
// Route::post('/reply/{comment}/like', [CommentController::class, 'likeReplyComment'])->name('replycomment.like')->middleware('auth');

// User profile routes
Route::get('/user/{user}/profile', [UserProfileController::class, 'index'])->name('userprofile')->middleware('auth');
Route::put('/user/{user}', [UserProfileController::class, 'update'])->name('profile.update')->middleware('auth');
Route::get('/user/{user}/edit', [UserProfileController::class, 'edit'])->name('profile.edit')->middleware('auth');

// Dashboard route
Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');


Route::get('/latest', function () {
    return view('latest.index');
});


