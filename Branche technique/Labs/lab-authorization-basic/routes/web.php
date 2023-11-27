<?php


use
    Illuminate\Support\Facades\Route;
    use App\Http\Controllers\TaskController;
    use App\Http\Controllers\ProjectController;
    use App\Http\Controllers\Auth\LoginController;
    use App\Http\Controllers\Auth\RegisterController;

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

Route::middleware(['guest'])->group(function () {
    Route::get('/', [LoginController::class, 'index'])->name('login');
    Route::post('/login', [LoginController::class, 'login']);
    // Route::get('/register', [RegisterController::class, 'index'])->name('register');
    // Route::post('/register', [RegisterController::class, 'create']);
});
// Route::resource('project', ProjectController::class);

// Route::resource('task', TaskController::class);

Route::middleware(['auth'])->group(function () {
    Route::get('/{project?}', [TaskController::class, 'index'])->name("task.index");
    Route::get('/{project}/create', [TaskController::class, 'create'])->name("task.create");
    Route::post('/{project}/create', [TaskController::class, 'store'])->name("task.store");
    Route::get('/{project}/edit/{task}', [TaskController::class, 'edit'])->name("task.edit");
    Route::put('/{project}/{task}', [TaskController::class, 'update'])->name("task.update");
    Route::delete('/{project}/{task}', [TaskController::class, 'destroy'])->name("task.destroy");
    Route::get('/{project}/search', [TaskController::class, 'searchTask'])->name("search.task");
    Route::post('/logout', [LoginController::class, 'logout'])->name('logout');
});



































