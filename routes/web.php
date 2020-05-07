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

Route::get('/inicio', "CuestionarioController@inicio");

//

Route::get('/perfil', 'UsuarioController@infoUsuario');

Route::get('/perfil/editar', 'UsuarioController@editarUsuarioFormulario');

Route::get('/perfil/passwordreset', 'UsuarioController@editarContraseniaForm');

Route::post('/perfil/passwordreset', 'UsuarioController@editarContrasenia');

Route::post('/perfil/editar', 'UsuarioController@editarUsuario');

Route::get('/perfil/cuestionarios', 'UsuarioController@listarCuestionarios');

Route::get('/perfil/cuestionarios/{id}', 'CuestionarioController@infoPerfilCuestionario');

Route::get('/perfil/{id}', 'UsuarioController@buscarPerfil');

//


Route::get('/cuestionarios', 'CuestionarioController@listar');

Route::get('/cuestionarios/buscar', 'CuestionarioController@buscarCuestionario');

Route::get('/cuestionarios/crear', 'CuestionarioController@formularioCrearCuestionario');

Route::post('/cuestionarios/crear' , 'CuestionarioController@crearCuestionario');

Route::get('/cuestionarios/{id}', 'CuestionarioController@infoCuestionario');

Route::get('/cuestionarios/jugar/{id}', 'CuestionarioController@jugarCuestionario');

Route::get('/cuestionarios/editar/{id}', 'CuestionarioController@mostrarCuestionarioAEditar');

Route::put('/cuestionarios/editar/{id}', 'CuestionarioController@actualizarCuestionario');

Route::delete('/cuestionarios/borrar/{id}', 'CuestionarioController@borrarCuestionario');

Route::get('/loginNuevo', function() {
  return view("loginNuevo");
});

//

Route::get('/api/cuestionarios/{id}', 'CuestionarioController@getPreguntas');

Route::post('/api/cuestionarios', 'PlayController@addPlay');

Route::get('/api/cuestionarios', "CuestionarioController@allCuestionarios");

Route::post('/api/cuestionarios/buscar', "CuestionarioController@buscarCuestionario");


//

Route::get('/ayuda', function() { return view('ayuda'); });

Route::get('/logout', 'Auth\LoginController@logout', function () {
    return abort(404);
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
