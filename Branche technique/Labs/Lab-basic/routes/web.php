<?php

use App\Http\Controllers\CompenteceController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\DB;

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

// Route::get('/', [CompenteceController::class, 'index'])->name('index');



Route::resource('/', CompenteceController::class);

Route::get('{id}/edit', [CompenteceController::class, 'edit']);

Route::put('/{id}', [CompenteceController::class, 'update'])->name('competence.update');

Route::delete('/{id}', [CompenteceController::class, 'destroy'])->name('competence.destroy');





// Route::get('/test-database-connection', function () {
//     try {
//         DB::connection()->getPdo();
//         return 'Database connection is successful';
//     } catch (Exception $e) {
//         return 'Database connection failed: ' . $e->getMessage();
//     }
// });





// Route::get('edit', function () {
//     return view('templates.edit');
// })->name('competence.edit');



// Add a catch-all route for 'competence' and redirect to 'index'
Route::get('/{any}', function () {
    return redirect()->route('index');
})->where('any', 'competence.*');
