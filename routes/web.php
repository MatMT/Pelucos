<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CitaController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\OlvideController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\ConfirmarController;

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

// Route::get('/', function () {
//     return view('welcome');
// });


// ============================== INICIO SESIÓN
Route::get('/', [LoginController::class, 'index'])->name('login')->middleware('guest');
Route::post('/', [LoginController::class, 'store'])->name('login.store');
Route::post('/logout', [LoginController::class, 'logout'])->name('logout'); // Cerrar Sesión

// Recuperar Password
Route::get('/olvide', [OlvideController::class, 'index'])->name('olvide')->middleware('guest');
Route::post('/olvide', [OlvideController::class, 'store'])->name('olvide.store');
Route::get('/recuperar', [RecuperarController::class, 'index'])->name('recuperar')->middleware('guest');
Route::post('/recuperar', [RecuperarController::class, 'store'])->name('recuperar.store');

// ============================== REGISTRO
Route::get('/crear-cuenta', [RegisterController::class, 'index'])->name('crear_cuenta');
Route::post('/crear-cuenta', [RegisterController::class, 'store'])->name('crear_cuenta.store');

// ============================== CONFIRMAR
Route::get('/mensaje/confirmar-cuenta', [ConfirmarController::class, 'index'])->name('confirmar');
Route::get('/confirmar-cuenta/confirmada/', [ConfirmarController::class, 'store'])->name('confirmar.store');

// ============================== NAVEGACIÓN
Route::get('/cita', [CitaController::class, 'index'])->name('cita')->middleware('auth');
Route::get('/admin', [AdminController::class, 'index'])->middleware('auth');

// CRUD de Servicios
Route::get('/servicios', [ServicioController::class, 'index'])->middleware('auth');
Route::get('/servicios/crear', [ServicioController::class, 'crear'])->middleware('auth');
Route::post('/servicios/crear', [ServicioController::class, 'crear'])->middleware('auth');
Route::get('/servicios/actualizar', [ServicioController::class, 'actualizar'])->middleware('auth');
Route::post('/servicios/actualizar', [ServicioController::class, 'actualizar'])->middleware('auth');
Route::post('/servicios/eliminar', [ServicioController::class, 'eliminar'])->middleware('auth');

// Comprueba y valida las rutas, que existan y les asigna las funciones del Controlador
// Route::comprobarRutas();
