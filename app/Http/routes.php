<?php


Route::controller('auth/password', 'Auth\PasswordController', [

        'getEmail' => 'auth.password.email',
        'getReset' => 'auth.password.reset'

    ]);

Route::controller('auth', 'Auth\AuthController', [
        'getLogin' => 'auth.login',
        'getLogout' => 'auth.logout'
    ]);

Route::get('backend/dashboard', ['as' => 'backend.dashboard', 'uses' => 'Backend\DashboardController@index']);

Route::get('/', function () {
    return view('welcome');
});
Route::get('backend/users/{users}/confirm', ['as' => 'backend.users.confirm', 'uses' => 'Backend\UsersController@confirm']);
Route::resource('backend/users', 'Backend\UsersController', ['except' => ['show']]);

Route::get('backend/roles/{roles}/confirm', ['as' => 'backend.roles.confirm', 'uses' => 'Backend\RolesController@confirm']);
Route::resource('backend/roles', 'Backend\RolesController', ['except' => ['show']]);

Route::get('backend/perms/{perms}/confirm', ['as' => 'backend.perms.confirm', 'uses' => 'Backend\PermsController@confirm']);
Route::resource('backend/perms', 'Backend\PermsController', ['except' => ['show']]);

Route::get('backend/patients/{patients}/confirm', ['as' => 'backend.patients.confirm', 'uses' => 'Backend\PatientsController@confirm']);
Route::resource('backend/patients', 'Backend\PatientsController');

Route::get('backend/baseinfos/{baseinfos}/confirm', ['as' => 'backend.baseinfos.confirm', 'uses' => 'Backend\BaseinfosController@confirm']);
Route::resource('backend/baseinfos', 'Backend\BaseinfosController', ['except' => ['index','show']]);


Route::get('backend/epibios/{epibios}/confirm', ['as' => 'backend.epibios.confirm', 'uses' => 'Backend\EpibiosController@confirm']);
Route::resource('backend/epibios', 'Backend\EpibiosController', ['except' => ['index','show', 'destroy']]);

Route::get('backend/clinicals/{clinicals}/confirm', ['as' => 'backend.clinicals.confirm', 'uses' => 'Backend\ClinicalsController@confirm']);
Route::resource('backend/clinicals', 'Backend\ClinicalsController', ['except' => ['index','show', 'destroy']]);

Route::get('backend/results/{results}/confirm', ['as' => 'backend.results.confirm', 'uses' => 'Backend\ResultsController@confirm']);
Route::resource('backend/results', 'Backend\ResultsController', ['except' => ['index','show', 'destroy']]);


Route::get('backend/olps/{olps}/confirm', ['as' => 'backend.olps.confirm', 'uses' => 'Backend\OlpsController@confirm']);
Route::resource('backend/olps', 'Backend\OlpsController', ['except' => ['index','show']]);

Route::get('backend/olks/{olks}/confirm', ['as' => 'backend.olks.confirm', 'uses' => 'Backend\OlksController@confirm']);
Route::resource('backend/olks', 'Backend\OlksController', ['except' => ['index','show']]);

Route::get('backend/cancers/{cancers}/confirm', ['as' => 'backend.cancers.confirm', 'uses' => 'Backend\CancersController@confirm']);
Route::resource('backend/cancers', 'Backend\CancersController', ['except' => ['index','show']]);



