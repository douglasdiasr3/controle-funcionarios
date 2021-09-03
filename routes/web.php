<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EmpresaController;
use App\Http\Controllers\FuncionarioController;


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

Route::resource('empresa', EmpresaController::class);
Route::get('empresa/delete/{id}', [EmpresaController::class, 'destroy']);

Route::resource('funcionario', FuncionarioController::class);
Route::get('funcionario/delete/{id}', [FuncionarioController::class, 'destroy']);
