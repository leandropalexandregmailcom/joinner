<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PaisController;
use App\Http\Controllers\PessoaController;
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

//Pesssoa
Route::get('/', [PessoaController::class, 'index'])->name('pessoa.index');
Route::get('/getAllPessoas', [PessoaController::class, 'getAll'])->name('pessoa.getAll');
Route::post('/createPessoa', [PessoaController::class, 'store'])->name('pessoa.store');
Route::get('/editPessoa', [PessoaController::class, 'edit'])->name('pessoa.edit');
Route::post('/updatePessoa', [PessoaController::class, 'update'])->name('pessoa.update');
Route::post('/deletePessoa', [PessoaController::class, 'delete'])->name('pessoa.delete');

//País
Route::get('/getAllPaises', [PaisController::class, 'getAll'])->name('pais.getAll');
