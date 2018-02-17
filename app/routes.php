<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/





/********************************************************************************** */
// Nos mostrará el formulario de login.
Route::get('login', 'AuthController@showLogin');

// Validamos los datos de inicio de sesión.
Route::post('login', 'AuthController@postLogin');

// Nos indica que las rutas que están dentro de él sólo serán mostradas si antes el usuario se ha autenticado.
Route::group(array('before' => 'Auth'), function()
{
    // Esta será nuestra ruta de bienvenida.
    Route::get('/', function()
    {
        return View::make('hello');
    });
    Route::get('/2', function()
    {
        return View::make('helloadmin');
    });
    // Esta ruta nos servirá para cerrar sesión.
    Route::get('logout', 'AuthController@logOut');
});


/*Route::get('/', function()
{
	return View::make('indexu');
});*/

Route::post('/upload', function(){
     if(Input::hasFile('foto')) {
          Input::file('foto')
               ->move('/assets','NuevoNombre.png');
     }
     return Redirect::back('/');
});

Route::resource('admin/users', 'Admin_UsersController');

Route::resource('admin/especialidades', 'Admin_EspecialidadesController');

Route::resource('admin/userespecialidads', 'Admin_UserespecialidadController');

Route::resource('admin/citas', 'Admin_CitasController');

Route::resource('admin/historiaspaciente', 'Admin_historiapacienteController');

Route::resource('admin/paciente', 'Admin_pacienteController');

Route::resource('admin/pdf', 'Admin_pdfController');

Route::resource('user/users', 'user_UsersController');

Route::resource('user/especialidades', 'user_EspecialidadesController');

Route::resource('user/userespecialidads', 'user_UserespecialidadController');

Route::resource('user/citas', 'user_citasController');

Route::resource('user/citapaciente', 'user_citapacienteController');

Route::resource('user/historiapaciente', 'user_historiapacienteController');

Route::resource('user/medicina', 'user_medicinaController');

Route::resource('user/sintomasysignos', 'user_sintomasysignosController');

Route::resource('user/enfermedad', 'user_enfermedadController');

Route::resource('user/pdf', 'user_pdfController');

//Route::get('user/historiapaciente/create/{id}');

Route::resource('user/paciente', 'user_pacienteController');

Route::resource('user/calendario', 'user_calendarioController');

Route::resource('user/historiapacienteenfermedad', 'user_historiapacienteController');
Route::resource('user/historiapacientemedicina', 'user_historiapacienteController');
Route::resource('user/historiapacientesintomasysignos', 'user_historiapacienteController');

//Route::get('user/historiapaciente/create/{id}', function()  {
//    return App::make('user_historiapacienteController')->create($id);
//}); 

//Route::get('user/citas/create/{id}');

/*Route::get('admin/userespecialidad/show/{userespecialidad}', function($id)
{
    $userespecialidad = Userespecialidad::find($id);
    return View::make('show_users', compact('userespecialidad'));
});*/

Route::get('search', 'HomeController@searchUsers');

Route::get('usernames', 'HomeController@getUsernames');


