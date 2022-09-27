<?php

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

Route::get('/', [App\Http\Controllers\FrontController::class, 'index'])->name('index');

Auth::routes();

Route::middleware('auth')->group(function () {
    Route::prefix('admin')->group(function () {
        Route::prefix('articles')->group(function () {
            Route::get('/', [App\Http\Controllers\ArticleController::class, 'index'])->name('article.index');
            Route::get('create', [App\Http\Controllers\ArticleController::class, 'create'])->name('article.create');
            Route::post('store', [App\Http\Controllers\ArticleController::class, 'store'])->name('article.store');
            Route::get('edit/{id}', [App\Http\Controllers\ArticleController::class, 'edit'])->name('article.edit');
            Route::post('update/{id}', [App\Http\Controllers\ArticleController::class, 'update'])->name('article.update');

            Route::get('delete-image/{id}', [App\Http\Controllers\ArticleController::class, 'deleteImage'])->name('article.delete-image');
            Route::get('destroy/{id}', [App\Http\Controllers\ArticleController::class, 'destroy'])->name('article.delete');
            Route::get('show/{id}', [App\Http\Controllers\ArticleController::class, 'show'])->name('article.show');
        });
    });
});