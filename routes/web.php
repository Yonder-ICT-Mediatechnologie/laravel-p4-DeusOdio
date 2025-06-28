<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\postContoller;
use App\Models\Post;

Route::get('/', function () {
    $posts = Post::with('user')->get();
    return view('home',['posts' => $posts]);
});

Route::get('/home', function () {
    $posts = Post::with('user')->get();
    return view('home', ['posts' => $posts]);
});

Route::post('/register', [UserController::class, 'register']);
Route::post('/logout', [UserController::class, 'logout']);
Route::get('/login', function () {
    return view('login');
});
Route::post('/login', [UserController::class, 'login']);
Route::get('/register', function () {
    return view('register');
});

Route::get('/editAccount', [UserController::class, 'showEditForm'])->middleware('auth');
Route::put('/editAccount', [UserController::class, 'updateAccount'])->middleware('auth');
Route::delete('/deleteAccount', [UserController::class, 'deleteAccount'])->middleware('auth');

Route::get('/create', function () {
    return view('create');
});
Route::post('/create', [postContoller::class, 'createPost']);
Route::get('/myPost', function () {
    $posts = Post::with('user')->where('user_id', auth()->id())->get();
    return view('myPost', ['posts' => $posts]);
});
Route::delete('/delete/{post}', [postContoller::class, 'deletePost']);
Route::get('/edit/{post}', [postContoller::class, 'showEditForm']);
Route::put('/edit/{post}', [postContoller::class, 'updatePost']);
