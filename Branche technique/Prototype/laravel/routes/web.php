<?php

use App\Http\Controllers\LoginUserController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\TaskController;
use App\Http\Middleware\IsLeader;
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


Route::get('member/waiting',function () {
    return view('waiting');
})->name('member.waiting');






Route::middleware('guest')->group(function () {
    Route::get('/',[LoginUserController::class,'create'])
                ->name('login');

    Route::post('login', [LoginUserController::class, 'store'])->name('login.store');


    // Route::get('forgot-password', [PasswordResetLinkController::class, 'create'])
    //             ->name('password.request');

    // Route::post('forgot-password', [PasswordResetLinkController::class, 'store'])
    //             ->name('password.email');
});

Route::middleware('auth')->group(function () {
    Route::post('logout', [LoginUserController::class, 'destroy'])
                ->name('logout');
});









Route::middleware('auth', 'IsLeader')->group(function () {
    Route::prefix('project')->group(function () {
        // Route::resource('/', ProjectController::class);
        Route::get('/', [ProjectController::class, 'index'])->name("project.index");
        Route::get('/create', [ProjectController::class, 'create'])->name("project.create");
        Route::post('/create', [ProjectController::class, 'store'])->name("project.store");
        Route::get('/{id}', [ProjectController::class, 'show'])->name("project.show");
        Route::get('/edit/{id}', [ProjectController::class, 'edit'])->name("project.edit");
        Route::PUT('/{id}', [ProjectController::class, 'update'])->name("project.update");
        Route::DELETE('/{id}', [ProjectController::class, 'destroy'])->name("project.destroy");
    });
    Route::prefix('project/tache')->group(function () {
        Route::get('/', [TaskController::class, 'index'])->name("task.index");
        Route::get('/edit', [TaskController::class, 'edit'])->name("task.edit");
        Route::get('/create', [TaskController::class, 'create'])->name("task.create");
    });
});


Route::middleware('auth', 'IsLeader')->group(function () {
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


// Route::group([], function () {
//     Route::prefix('member')->group(function () {
//         Route::get('/', function () {
//             return view('member.index');
//         })->name("member.index");

//         Route::get('/edit', function () {
//             return view('member.edit');
//         })->name("member.edit");

//         Route::get('/create', function () {
//             return view('member.create');
//         })->name("member.create");
//     });
// });






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
















// require __DIR__.'/auth.php';
