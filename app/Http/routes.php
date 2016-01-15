<?php

/*
|--------------------------------------------------------------------------
| Routes File
|--------------------------------------------------------------------------
|
| Here is where you will register all of the routes in an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/conditions-generales', ['as'=>'route_cgv', function () {
    return view('cgv');
}]);

Route::get('/notre-equipe', [
    'uses' => 'MainController@equipe',
    'as' => 'route_equipe'
]);

/*------------ PAGES ----------------------------------------------------*/




/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| This route group applies the "web" middleware group to every route
| it contains. The "web" middleware group is defined in your HTTP
| kernel and includes session state, CSRF protection, and more.
|
*/

Route::group(['middleware' => ['web']], function () {

    Route::get('/', [
        'uses' => 'MainController@accueil',
        'as' => 'home'
    ]);

    Route::any('/contact', [
        'uses' => 'MainController@contact',
        'as' => 'contact'
    ]);
});
