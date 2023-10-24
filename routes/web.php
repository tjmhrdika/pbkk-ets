<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ItemController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('home', [ItemController::class, 'index']);
Route::get('add', [ItemController::class, 'add']);
Route::post('home', [ItemController::class, 'addProcess']);
Route::get('edit/{id}', [ItemController::class, 'edit']);
Route::patch('home/{id}', [ItemController::class, 'editProcess']);
Route::delete('home/{id}', [ItemController::class, 'delete']);