<?php

use App\Http\Controllers\BlogController;
use App\Http\Controllers\GenreController;
use App\Http\Controllers\HomeController;
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

    //Genre Routes
    Route::get('/admin/genres', [GenreController::class, 'index'])-> name('admin.genre.index');
    Route::get('/admin/genres/create', [GenreController::class, 'create'])-> name('admin.genre.create');
    Route::post('/admin/genres/create', [GenreController::class, 'store'])-> name('admin.genre.create');
    });

Route::get('/home', [HomeController::class, 'index'])->name('home');
Route::get('/blogs', [BlogController::class, 'index'])->name('blog.index');

