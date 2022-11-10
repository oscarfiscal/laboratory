<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EmployeController;

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
    return view('auth.login');
});

Route::get('/dashboard', [EmployeController::class, 'index'])->middleware(['auth', 'verified'])->name('dashboard');


Route::post('/import', [EmployeController::class, 'import'])->name('import');

Route::get('/upload', function () {
    return view('upload');
})->middleware(['auth', 'verified'])->name('upload');

Route::get('/employes', [EmployeController::class, 'index'])->name('employes.index');

Route::get('/auth', function () {
    return view('login');
})->name('auth');

Route::get('/history', function () {
    return view('history');
})->middleware('LastLogin')->name('employe.history');

require __DIR__.'/auth.php';

