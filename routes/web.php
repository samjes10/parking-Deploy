<?php

use Illuminate\Support\Facades\Route;
//agregamos los siguientes controladores
use App\Http\Controllers\HomeController;
use App\Http\Controllers\RolController;
use App\Http\Controllers\UsuarioController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\ParqueoController;
use App\Http\Controllers\OperadorController;
use App\Http\Controllers\PagoController;
use App\Http\Controllers\EspacioController;
use Illuminate\Support\Facades\Auth;

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

Route::get('/home-operador', [App\Http\Controllers\HomeOperadorController::class, 'index'])->name('home-operador');

//y creamos un grupo de rutas protegidas para los controladores
Route::group(['middleware' => ['auth']], function() {
    Route::resource('roles', RolController::class);
    Route::resource('usuarios', UsuarioController::class);
    Route::resource('blogs', BlogController::class);
    
});

Route::resource('parqueos', ParqueoController::class);
Route::resource('espacios', EspacioController::class);
Route::resource('operador', OperadorController::class);
Route::resource('pagos', PagoController::class);
Route::post('/procesar-pago', [PagoController::class, 'procesarPago'])->name('procesar_pago');

//Route::get('/operador', function () {
//    return view('operador');
//})->middleware(['auth', 'checkrole:operador']);