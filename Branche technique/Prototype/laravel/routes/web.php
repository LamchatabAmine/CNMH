<?php

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
    return view('index');
})->name("login");



Route::group([], function () {
    Route::prefix('project')->group(function () {
        Route::get('/', function () {
            return view('project.index');
        })->name("project.index");

        Route::get('/edit', function () {
            return view('project.edit');
        })->name("project.edit");

        Route::get('/create', function () {
            return view('project.create');
        })->name("project.create");
    });
});






Route::group([], function () {
    Route::prefix('project/tache')->group(function () {
        Route::get('/', function () {
            return view('project.task.index');
        })->name("task.index");

        Route::get('/edit', function () {
            return view('project.task.edit');
        })->name("task.edit");

        Route::get('/create', function () {
            return view('project.task.create');
        })->name("task.create");
    });
});




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

