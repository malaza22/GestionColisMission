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
    return view('auth.login');
});

Auth::routes();

Route::group(['middleware' => ['auth']], function () {
    Route::get('/home', 'HomeController@index')->name('home');
    Route::match(['get', 'post'], '/view-user', 'HomeController@show');
    Route::match(['get', 'post'], '/update-user/{id}', 'HomeController@update');

    Route::match(['get', 'post'], '/add-agency', 'AgencesController@index');
    Route::match(['get', 'post'], '/list-agency', 'AgencesController@show');
    Route::match(['get', 'post'], '/update-agency/{id}', 'AgencesController@update');
    Route::match(['get', 'post'], '/destroy-agency/{id}', 'AgencesController@destroy');

    Route::match(['get', 'post'], '/add-service', 'ServiceController@index');
    Route::match(['get', 'post'], '/list-service', 'ServiceController@show');
    Route::match(['get', 'post'], '/update-service/{id}', 'ServiceController@update');
    Route::match(['get', 'post'], '/destroy-service/{id}', 'ServiceController@destroy');

    Route::match(['get', 'post'], '/add-job', 'JobController@index');
    Route::match(['get', 'post'], '/list-job', 'JobController@show');
    Route::match(['get', 'post'], '/update-job/{id}', 'JobController@update');
    Route::match(['get', 'post'], '/destroy-job/{id}', 'JobController@destroy');

    Route::match(['get', 'post'], '/add-personal', 'PersonalController@index');
    Route::match(['get', 'post'], '/list-personal', 'PersonalController@show');
    Route::match(['get', 'post'], '/update-personal/{id}', 'PersonalController@update');
    Route::match(['get', 'post'], '/destroy-personal/{id}', 'PersonalController@destroy');

    Route::match(['get', 'post'], '/add-product', 'ProductController@index');
    Route::match(['get', 'post'], '/list-product', 'ProductController@show');
    Route::match(['get', 'post'], '/update-product/{id}', 'ProductController@update');
    Route::match(['get', 'post'], '/destroy-product/{id}', 'ProductController@destroy');


    Route::match(['get', 'post'], '/add-packaging', 'PackagingController@index');
    Route::match(['get', 'post'], '/list-packaging', 'PackagingController@show');
    Route::match(['get', 'post'], '/update-packaging/{id}', 'PackagingController@update');
    Route::match(['get', 'post'], '/destroy-packaging/{id}', 'PackagingController@destroy');


    Route::match(['get', 'post'], '/add-carrier', 'CarrierController@index');
    Route::match(['get', 'post'], '/list-carrier', 'CarrierController@show');
    Route::match(['get', 'post'], '/edite-carrier/{id}', 'CarrierController@edite');


    Route::match(['get', 'post'], '/add-preparation', 'PreparationController@index');
    Route::match(['get', 'post'], '/liste-preparation', 'PreparationController@show');
    Route::match(['get', 'post'], '/view-preparation/{id}', 'PreparationController@view');
    Route::match(['get', 'post'], '/edite-preparation/{id}', 'PreparationController@edite');
    Route::match(['get', 'post'], '/update-preparation/{id}', 'PreparationController@update');
    Route::match(['get', 'post'], '/destroy-preparation/{id}', 'PreparationController@destroy');

    Route::match(['get', 'post'], '/add-preparation/{id}', 'ParcelController@add');
    Route::match(['get', 'post'], '/create-preparation', 'ParcelController@create');
    Route::match(['get', 'post'], '/edite-parcel/{id}', 'ParcelController@edite');
    Route::match(['get', 'post'], '/destroy-parcel/{id}', 'ParcelController@destroy');


    Route::match(['get', 'post'], '/add-mouvement', 'MouvementController@index');
    Route::match(['get', 'post'], '/liste-mouvement', 'MouvementController@show');
    Route::match(['get', 'post'], '/liste-mouvement/{id}', 'MouvementController@update');
    Route::match(['get', 'post'], '/view-mouvement/{id}', 'MouvementController@view');
    Route::match(['get', 'post'], '/edite-mouvement/{id}', 'MouvementController@edite');
    Route::match(['get', 'post'], '/destroy-mouvement/{id}', 'MouvementController@destroy');


    Route::match(['get', 'post'], '/liste-envoyer', 'EnvoyerController@index');
    Route::match(['get', 'post'], '/view-envoyer/{id}', 'EnvoyerController@view');

    Route::match(['get', 'post'], '/liste-reçue', 'ReçueController@index');
    Route::match(['get', 'post'], '/view-reçue/{id}', 'ReçueController@view');
    Route::match(['get', 'post'], '/aquis-reçue/{id}', 'ReçueController@update');

    Route::get('/print-envoyer/{id}', 'EnvoyerController@print')->name('print');
});

