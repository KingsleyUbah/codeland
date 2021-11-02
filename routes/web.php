<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\LogoutController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ThreadController;
use App\Http\Controllers\CommentController;


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


Route::get('/login', [LoginController::class, 'index'])->name('login');
Route::post('/login', [LoginController::class, 'store']);

Route::post('/logout', [LogoutController::class, 'store'])->name('logout');

Route::get('/register', [RegisterController::class, 'index'])->name('register');
Route::post('/register', [RegisterController::class, 'store']);


Route::resource('thread', ThreadController::class);


Route::post('comment/create/{thread}', [CommentController::class, 'addThreadComment'])->name('threadcomment.store');
Route::put('comment/{comment}', [CommentController::class, 'updateThreadComment'])->name('threadcomment.update');
Route::delete('comment/{comment}', [CommentController::class, 'deleteThreadComment'])->name('threadcomment.destroy');



Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

Route::get('/latest', function () {
    return view('latest.index');
});


