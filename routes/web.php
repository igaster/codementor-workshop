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

Route::get('/dashboard', [TaskController::class, 'index'])->name('dashboard');
Route::post('/task', [TaskController::class, 'store']);
Route::get('/task/{task}/delete', [TaskController::class, 'destroy']);

require __DIR__.'/auth.php';
