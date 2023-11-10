<?php

use App\Http\Controllers\LoginUserController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProjectController;
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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

// Route::middleware('auth')->group(function () {
//     Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
//     Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
//     Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
// });







route::get('/',[LoginUserController::class,'create'])->name('login');


Route::middleware('auth')->group(function () {
    Route::prefix('project')->group(function () {
        Route::get('/', [ProjectController::class, 'index'])->name("project.index");
        Route::get('/edit', [ProjectController::class, 'edit'])->name("project.edit");
        Route::get('/create', [ProjectController::class, 'create'])->name("project.create");
    });
    Route::prefix('project/tache')->group(function () {
        Route::get('/', [TaskController::class, 'index'])->name("task.index");
        Route::get('/edit', [TaskController::class, 'edit'])->name("task.edit");
        Route::get('/create', [TaskController::class, 'create'])->name("task.create");
    });
});









// Route::get('/', function () {
//     return view('index');
// })->name("login");



// Route::group([], function () {
//     Route::prefix('project')->group(function () {
//         Route::get('/', function () {
//             return view('project.index');
//         })->name("project.index");

//         Route::get('/edit', function () {
//             return view('project.edit');
//         })->name("project.edit");

//         Route::get('/create', function () {
//             return view('project.create');
//         })->name("project.create");
//     });
// });

// Route::group([], function () {
//     Route::prefix('project/tache')->group(function () {
//         Route::get('/', function () {
//             return view('project.task.index');
//         })->name("task.index");

//         Route::get('/edit', function () {
//             return view('project.task.edit');
//         })->name("task.edit");

//         Route::get('/create', function () {
//             return view('project.task.create');
//         })->name("task.create");
//     });
// });




Route::group([], function () {
    Route::prefix('member')->group(function () {
        Route::get('/', function () {
            return view('member.index');
        })->name("member.index");

        Route::get('/edit', function () {
            return view('member.edit');
        })->name("member.edit");

        Route::get('/create', function () {
            return view('member.create');
        })->name("member.create");
    });
});












require __DIR__.'/auth.php';
