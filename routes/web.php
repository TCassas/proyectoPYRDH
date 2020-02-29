<?php

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

Route::get('/inicio', function() { return view('inicio'); });


Route::get('/perfil', 'UsuarioController@info');

Route::get('/perfil/editar', 'UsuarioController@editarInfo');

Route::get('/cuestionarios', 'CuestionarioController@listar');

Route::get('/cuestionarios/crear', function() { return view('crearCuestionario')});

Route::post('/cuestionarios/crear' , 'CuestionarioController@crearCuestionario');

Route::get('/cuestionarios/{id}', function() {
  return "Test";
});

Route::get('/cuestionarios/editar/{id}', 'CuestionarioController@mostrarCuestionarioAEditar');

Route::delete('/cuestionarios/borrar/{id}', 'CuestionarioController@borrarCuestionario');

Route::get('/perfil/cuestionarios', 'UsuarioController@listarCuestionarios');

Route::get('/ayuda', function() { return view('ayuda'); });

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
