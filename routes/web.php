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

 Route::get('/', function () {
     return view('welcome');
 });


Auth::routes();


// This is for admin access
/*Route::get('/admin', function () {
    return view('admin.index');
})->middleware(['auth','role:admin'])-> name('admin.index');*/

Route::get('/admin', [App\Http\Controllers\BlogController::class, 'adminIndex'])->middleware(['auth','role:admin'])-> name('admin.index');
Route::get('/admin/create', [App\Http\Controllers\BlogController::class, 'create'])->middleware(['auth','role:admin'])-> name('admin.create');
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/blogs', [App\Http\Controllers\BlogController::class, 'index'])->name('blog.index');

