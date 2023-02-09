<?php

use App\Http\Controllers\BlogController;
use App\Http\Controllers\DataController;
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
    Route::get('/admin/blogs', [BlogController::class, 'adminIndex'])-> name('admin.index');
    Route::get('/admin/blogs/create', [BlogController::class, 'create'])-> name('admin.create');
    Route::post('/admin/blogs/create', [BlogController::class, 'store'])-> name('admin.store');
    Route::get('/admin/blogs/edit/{id}', [BlogController::class, 'edit']);
    Route::post('/admin/blogs/update/{id}', [BlogController::class, 'update']);
    Route::get('/admin/blogs/delete/{id}', [BlogController::class, 'destroy']);
    Route::get('/admin/blogs/show/{id}', [BlogController::class, 'show']);

    //Genre Routes
    Route::get('/admin/genres', [GenreController::class, 'index'])-> name('admin.genre.index');
    Route::get('/admin/genres/create', [GenreController::class, 'create'])-> name('admin.genre.create');
    Route::post('/admin/genres/create', [GenreController::class, 'store'])-> name('admin.genre.store');
    Route::get('/admin/genres/edit/{id}', [GenreController::class, 'edit']);
    Route::post('/admin/genres/update/{id}', [GenreController::class, 'update']);

    //Tag Routes
    Route::get('/admin/tags', [TagController::class, 'index'])-> name('admin.tag.index');
    Route::get('/admin/tags/create', [TagController::class, 'create'])-> name('admin.tag.create');
    Route::post('/admin/tags/create', [TagController::class, 'store'])-> name('admin.tag.store');

    //User Routes
    Route::get('/admin/users', [HomeController::class, 'userIndex'])-> name('admin.user.index');

    //Data Routes
    Route::get('/admin/data/create', [DataController::class, 'create'])-> name('admin.data.create');
    Route::post('/admin/data/store', [DataController::class, 'store'])-> name('admin.data.store');
    Route::get('/admin/data/upload', [DataController::class, 'upload']);
    });

Route::get('/home', [HomeController::class, 'newIndex'])->name('home');
Route::get('/blogs', [BlogController::class, 'index'])->name('blog.index');

