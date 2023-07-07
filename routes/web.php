<?php

use App\Http\Controllers\SupportController;
use App\Http\Controllers\TarefaController;
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

// ADMIN/SUPPORTS
/* Route::get('/supports', [SupportController::class, 'index'])->name('supports.index');
Route::get('/supports/create', [SupportController::class, 'create'])->name('supports.create');
Route::post('/supports/store', [SupportController::class, 'store'])->name('supports.store');
Route::get('/supports/{id}', [SupportController::class, 'show'])->name('supports.show');
Route::get('/supports/{id}/edit', [SupportController::class, 'edit'])->name('supports.edit');
Route::put('/supports/{id}', [SupportController::class, 'update'])->name('supports.update');
Route::delete('/supports/{id}', [SupportController::class, 'destroy'])->name('supports.destroy'); */

// TAREFAS
Route::get('/', [TarefaController::class, 'index'])->name('tarefas.index');
Route::get('/create', [TarefaController::class, 'create'])->name('tarefas.create');
Route::post('/store', [TarefaController::class, 'store'])->name('tarefas.store');
//Route::get('/{id}', [TarefaController::class, 'show'])->name('tarefas.show');
Route::get('/concluidos', [TarefaController::class, 'completedList'])->name('tarefas.completed_list');
Route::get('/{id}/completed', [TarefaController::class, 'completed'])->name('tarefas.completed');
Route::get('/{id}/edit', [TarefaController::class, 'edit'])->name('tarefas.edit');
Route::put('/{id}/update', [TarefaController::class, 'update'])->name('tarefas.update');
Route::delete('/{id}/delete', [TarefaController::class, 'destroy'])->name('tarefas.destroy');
