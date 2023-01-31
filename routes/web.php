<?php

use App\Http\Controllers\BlogController;
use App\Http\Controllers\GenreController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\TagController;
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


Auth::routes();


// This is for admin access
/*Route::get('/admin', function () {
    return view('admin.index');
})->middleware(['auth','role:admin'])-> name('admin.index');*/




Route::middleware(['auth','role:admin'])->group(function () {

    //Blog Routes
    Route::get('/admin', [BlogController::class, 'adminIndex'])-> name('admin.index');
    Route::get('/admin/create', [BlogController::class, 'create'])-> name('admin.create');
    Route::post('/admin/create', [BlogController::class, 'store'])-> name('admin.store');

    //Genre Routes
    Route::get('/admin/genres', [GenreController::class, 'index'])-> name('admin.genre.index');
    Route::get('/admin/genres/create', [GenreController::class, 'create'])-> name('admin.genre.create');
    Route::post('/admin/genres/create', [GenreController::class, 'store'])-> name('admin.genre.store');

    //Genre Routes
    Route::get('/admin/tags', [TagController::class, 'index'])-> name('admin.tag.index');
    Route::get('/admin/tags/create', [TagController::class, 'create'])-> name('admin.tag.create');
    Route::post('/admin/tags/create', [TagController::class, 'store'])-> name('admin.tag.store');


    });

Route::get('/home', [HomeController::class, 'index'])->name('home');
Route::get('/blogs', [BlogController::class, 'index'])->name('blog.index');

