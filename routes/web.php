<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\SharingPostController;

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
    return view('home');
});
Route::get('/home', function () {
    return view('home');
})->name('home');

Route::prefix('user')->group(function (){
    Route::get('/login', [UserController::class, 'login'])->name('user.login-form');
    Route::post('/login', [UserController::class, 'postLogin'])->name('user.login');

    Route::get('/register', [UserController::class, 'register'])->name('user.register-form');
    Route::post('/register', [UserController::class, 'postRegister'])->name('user.register');

    Route::get('/logout', [UserController::class, 'logout'])->name('user.logout');
});

Route::prefix('sharing')->group(function (){
    Route::get('/', [SharingPostController::class, 'index'])->name('sharing.index');
    Route::get('/single-post/{id}', [SharingPostController::class, 'single_post'])->name('sharing.single-post');
    Route::post('/single-post-comment', [SharingPostController::class, 'single_post_comment'])->name('sharing.single-post-comment');
    Route::get('/create', [SharingPostController::class, 'create'])->name('sharing.create');
    Route::post('/store', [SharingPostController::class, 'store'])->name('sharing.store');
    Route::get('/edit/{id}', [SharingPostController::class, 'edit'])->name('sharing.edit');
    Route::post('/update/{id}', [SharingPostController::class, 'update'])->name('sharing.update');
    Route::get('/delete/{id}', [SharingPostController::class, 'delete'])->name('sharing.delete');
});



