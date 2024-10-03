<?php

use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LikeController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\ImagenController;
use App\Http\Controllers\LogoutController;
use App\Http\Controllers\PerfilController;
use App\Http\Controllers\DropzoneController;
use App\Http\Controllers\FollowerController;
use App\Http\Controllers\ComentarioController;
use App\Http\Controllers\Auth\RegisterController;

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

//agregar cambio de password

Route::get('/', HomeController::class)->name('home');
     
Route::get('/crear-cuenta', [RegisterController::class, 'index'])->name('register');
Route::post('/crear-cuenta',[RegisterController::class, 'register'])->name('crear.cuenta');


Route::get('/posts/create', [PostController::class, 'create'])->name('post.create');
Route::get('user/{user:username}/posts/{post}',[PostController::class, 'show'])->name('posts.show');
Route::post('user/{user:username}/posts/{post}',[ComentarioController::class, 'store'])->name('comentarios.store');
Route::post('/login', [LoginController::class, 'store']);
Route::get('/login', [LoginController::class, 'index'])->name('login');


Route::post('/logout', [LogoutController::class, 'logout'])->name('logout');

Route::post('/imagenes', [PostController::class, 'store'])->name('imagen.store');

Route::delete('/delete/{post}', [PostController::class, 'destroy'])->name('post.destroy');

// Route::get('/dropzone', [DropzoneController::class,'index']);
Route::post('/dropzone/store',[DropzoneController::class,'store'])->name('dropzone.store');

Route::post('/posts/{post}/like', [LikeController::class, 'store'])->name('posts.likes.store');
Route::delete('/posts/{post}/like', [LikeController::class, 'destroy'])->name('posts.likes.destroy');

Route::get('/editar-perfil', [PerfilController::class, 'index'])->name('perfil.index');

Route::post('/editar-perfil', [PerfilController::class, 'store'])->name('perfil.store');

Route::get('user/{user:username}', [PostController::class, 'index'])->name('post.index');

Route::post('/{user:username}/follow', [FollowerController::class, 'store'])->name('users.follow');
Route::delete('/{user:username}/unfollow', [FollowerController::class, 'destroy'])->name('users.unfollow');


