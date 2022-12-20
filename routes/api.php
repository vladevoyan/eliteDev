<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BooksController;
use App\Http\Controllers\AuthorsController;
use App\Http\Controllers\SearchController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\OrdersController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::get('books',[BooksController::class, 'index']);
Route::post('book',[BooksController::class, 'store']);
Route::put('book',[BooksController::class, 'update']);


Route::get('authors',[AuthorsController::class, 'index']);
Route::post('author',[AuthorsController::class, 'store']);
Route::put('author',[AuthorsController::class, 'update']);


Route::get('search/{searchKeyword}',[SearchController::class, 'search']);


Route::post('register',[UserController::class, 'register']);
Route::post('login',[UserController::class, 'login']);

Route::post('purchase', [OrdersController::class, 'purchase'])->middleware('auth:api');
