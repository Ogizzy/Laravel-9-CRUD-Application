<?php
use App\Http\Controllers\TodoController;
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
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('todo/index', [TodoController::class, 'index'])->name('todo.index');
Route::get('todo/create', [TodoController::class, 'create'])->name('todo.create');
Route::post('todo/store', [TodoController::class, 'store'])->name('todo.store');
Route::get('todo/show/{id}', [TodoController::class, 'show'])->name('todo.show');
Route::get('todo/edit/{id}', [TodoController::class, 'edit'])->name('todo.edit');
Route::put('todo/update', [TodoController::class, 'update'])->name('todo.update');
Route::delete('todo/destroy', [TodoController::class, 'destroy'])->name('todo.ddestroy');