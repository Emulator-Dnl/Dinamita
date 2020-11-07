<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UsuariosController;

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

//CRUD PARA USUARIOS


/*Route::get('usuarios', [UsuariosController::class, 'index']);
Route::get('usuarios/create', [UsuariosController::class, 'create']);
Route::post('usuarios', [UsuariosController::class, 'store']);
Route::get('usuario/{usuario}', [UsuariosController::class, 'show']);
Route::post('usuarios', [UsuariosController::class, 'store']);
Route::get('usuarios/{usuario}/edit', [UsuariosController::class, 'edit']);
Route::post('usuarios/{usuario}', [UsuariosController::class, 'update']);
Route::post('usuarios/{usuario}/delete', [UsuariosController::class, 'destroy']);*/

Route::get('usuarios/reporte-pdf', [UsuariosController::class, 'reportePDF'])->name('reporte.pdf');
Route::resource('usuarios', UsuariosController::class);

/*Route::get('usuarios', function () {
    return view('usuarios/usuariosIndex');
});

Route::get('usuarios/create', function () {
    return view('usuarios/usuariosForm');
});*/

/*Route::post('usuarios', function (Request $request) {
	return redirect('/usuarios');
});

Route::get('usuarios/{id}', function () {
	
});

Route::get('usuarios/{id}/edit', function () {
	
});

Route::post('usuarios/{id}', function (Request $request) {
	return redirect('/usuarios');
});*/