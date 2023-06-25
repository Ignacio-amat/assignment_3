<?php

use App\Http\Controllers\FooController;
use App\Http\Controllers\UsersController;
use Illuminate\Support\Facades\Route;

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
Route::get('/foos', [FooController::class, 'index'])->name('foos.index');

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
    Route::get('/foos/create', [FooController::class, 'create'])->name('foos.create');
    Route::post('/foos', [FooController::class, 'store'])->name('foos.store');
    Route::get('/foos/{foo}', [FooController::class, 'show'])->name('foos.show');
    Route::get('/foos/{foo}/edit', [FooController::class, 'edit'])->name('foos.edit');
    Route::put('/foos/{foo}', [FooController::class, 'update'])->name('foos.update');
});

Route::middleware(['admin'])->group(function () {
    Route::delete('/foos/{foo}', [FooController::class, 'destroy'])->name('foos.delete');
    Route::resource('/users', UsersController::class)->names('users');
});
