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

// Route::get('/', function () {
//     return view('welcome');
// });

Auth::routes();

Route::get('/',function(){
    return view('auth.login');
});

Route::group(['middleware' => ['auth', 'active']], function() {
    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
    Route::get('/menu', [\App\Http\Controllers\MenuController::class, 'index'])->name('menu.index');
    Route::get('/menu/create', [\App\Http\Controllers\MenuController::class, 'create'])->name('menu.create');
    Route::post('/menu', [\App\Http\Controllers\MenuController::class, 'store'])->name('menu.store');
    Route::get('/menu/{menu}', [\App\Http\Controllers\MenuController::class, 'show'])->name('menu.show');
    Route::get('/menu/{menu}/edit', [\App\Http\Controllers\MenuController::class, 'edit'])->name('menu.edit');
    Route::put('/menu/{menu}', [\App\Http\Controllers\MenuController::class, 'update'])->name('menu.update');
    Route::delete('/menu/{menu}', [\App\Http\Controllers\MenuController::class, 'destroy'])->name('menu.destroy');
});