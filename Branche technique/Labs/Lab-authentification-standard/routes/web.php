<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TaskController;

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
    return view('auth.login');
});




Route::middleware(['auth'])->group(function () {
    Route::get('tache/{project?}', [TaskController::class, 'index'])->name("task.index");
    Route::get('tache/{project}/create', [TaskController::class, 'create'])->name("task.create");
    Route::post('tache/{project}/create', [TaskController::class, 'store'])->name("task.store");
    Route::get('tache/{project}/edit/{task}', [TaskController::class, 'edit'])->name("task.edit");
    Route::put('tache/{project}/{task}', [TaskController::class, 'update'])->name("task.update");
    Route::delete('tache/{project}/{task}', [TaskController::class, 'destroy'])->name("task.destroy");
    Route::get('tache/{project}/search', [TaskController::class, 'searchTask'])->name("search.task");
});









Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();
