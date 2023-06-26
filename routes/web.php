<?php

use App\Http\Controllers\FilterController;
use App\Http\Controllers\TransactionsController;
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
    return view('home2');
});
Route::group(['as' => 'users.', 'prefix' => 'users'], function () {
    Route::get('/', [UsersController::class, 'index'])->name('index');
    Route::get('/create', [UsersController::class, 'create'])->name('create');
    Route::post('/store', [UsersController::class, "store"])->name('store');
    Route::get('/json-file', [UsersController::class, "jsonFile"])->name("json.file");
    Route::post('/json-store', [UsersController::class, "jsonStore"])->name("json.store");
    Route::get('/edit/{id}', [UsersController::class, 'edit'])->name('edit');

    Route::post('/update/{id}', [UsersController::class, "update"])->name('update');

    Route::get('/delete/{id}', [UsersController::class, 'delete'])->name('delete');
    Route::get('/details/{id}', [UsersController::class, "details"])->name('details');

});

Route::group(['as' => 'transactions.', 'prefix' => 'transactions'], function () {

    Route::get('/', [TransactionsController::class, "index"])->name('index');
    Route::get('/create', [TransactionsController::class, "create"])->name('create');
    Route::post('/store', [TransactionsController::class, "store"])->name('store');
    Route::get("/edit/{id}", [TransactionsController::class, "edit"])->name('edit');
    Route::post('/update/{id}', [TransactionsController::class, "update"])->name('update');
    Route::get('/json-file', [TransactionsController::class, "jsonFile"])->name("json.file");
    Route::post('/json-store', [TransactionsController::class, "jsonStore"])->name("json.store");
    Route::get('/delete/{id}', [TransactionsController::class, 'delete'])->name('delete');
    Route::get('/details/{id}', [TransactionsController::class, "details"])->name('details');
});

Route::group(['as' => 'filter.', 'prefix' => 'filter'], function () {
    Route::post('/', [FilterController::class, "index"])->name('index');
});