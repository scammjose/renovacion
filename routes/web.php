<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PrestamoController;

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

Route::get('/',[PrestamoController::class,'index'])->name('index');
Route::post('/buscar', [PrestamoController::class, 'busqueda'])->name('busqueda');
// Route::post('/renovacion', [PrestamoController::class, 'insertar'])->name('insertar');
// Route::get('/equipos/matricula', [PrestamoController::class, 'show'])->name('equipos');
// Route::get('/', function () {
//     return view('index'); 
// });
// Route::get('/equipos',[PrestamoController::class,'busqueda'])->name('equipos');

Route::get('/equipos', [PrestamoController::class, 'mostrar'])->name('mostrar');
Route::post('/insertar', [PrestamoController::class, 'renovar'])->name('renovar');