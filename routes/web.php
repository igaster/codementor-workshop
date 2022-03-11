<?php

use App\Http\Controllers\TaskController;
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

Route::get('/dashboard', [TaskController::class, 'index'])->middleware(['auth'])->name('dashboard');

Route::post('/tasks', [TaskController::class, 'store']);
Route::get('/task/{task}/delete', [TaskController::class, 'destroy']);
Route::get('/task/{task}/complete', [TaskController::class, 'complete']);
Route::get('/task/{task}/restore', [TaskController::class, 'restore']);

require __DIR__.'/auth.php';
