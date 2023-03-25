<?php

use App\Http\Controllers\SuperheroeController;
use Illuminate\Support\Facades\Auth;
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
    return view('auth.login');
});
Route::controller(SuperheroeController::class)->group(function(){
    //El ->name despues de la ruta sirve para facilitar el uso de las ligas en href
    //Basicamente si cambio el link de inicio a superheroes, el ->name() sirve para ahorrar mucho esfuerzo
    Route::get('inicio','index')->name("superheroes.index");
    Route::get('crearSuperheroe','create')->name("superheroes.create");
    Route::post('heroeCreado','store')->name("superheroes.store");
    Route::delete('heroeEliminado/{superheroe}','destroy')->name("superheroes.destroy");
    Route::get('editarSuperheroe/{superheroe}','edit')->name("superheroes.edit");
    Route::put('heroeEditado/{superheroe}','update')->name("superheroes.update");
});

Auth::routes();

Route::get('/home', [SuperheroeController::class, 'index'])->name('home');

Route::group(['middleware' => 'auth'], function(){
    Route::get('/', [SuperheroeController::class, 'index'])->name('home');
});