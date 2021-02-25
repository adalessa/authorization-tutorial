<?php

use App\Http\Controllers\PostController;
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

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

Route::middleware(['auth'])->group(function () {
    Route::get('post', [PostController::class, 'index'])->name('posts');
    Route::get('post/create', [PostController::class, 'create']);
    Route::post('post', [PostController::class, 'store']);
    Route::get('post/{post}', [PostController::class, 'show']);
    Route::get('post/{post}/editar', [PostController::class, 'editar']);
    Route::put('post/{post}', [PostController::class, 'update']);
});

require __DIR__ . '/auth.php';
