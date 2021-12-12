<?php

use App\Http\Controllers\MappingController;
use App\Http\Controllers\UsersController;
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
    return redirect()->route('mapping.index');
});

// Route::get('users', [UsersController::class, 'index'])->name('user.index');
// Route::resource('users', UsersController::class)->names('users');
// Route::post('users-import', [UsersController::class, 'import'])->name('user.import');

Route::get('mapping', [MappingController::class, 'index'])->name('mapping.index');
Route::post('mapping-import', [MappingController::class, 'import'])->name('mapping.import');
