<?php

use App\Http\Controllers\EmployeeController;
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

// Route::resource('employees', EmployeeController::class);
Route::get('/', [EmployeeController::class, 'index'])->name('index');
Route::get('/create', [EmployeeController::class, 'create'])->name('create');
Route::post('/', [EmployeeController::class, 'store'])->name('store');
Route::get('/{employee}', [EmployeeController::class, 'show'])->name('show');
Route::get('/{employee}/edit', [EmployeeController::class, 'edit'])->name('edit');
Route::post('/{employee}', [EmployeeController::class, 'update'])->name('update');
Route::delete('/employee/{employee}', [EmployeeController::class, 'destroy'])->name('destroy');