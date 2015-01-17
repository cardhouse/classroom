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

Event::listen('Classroom.Registration.Events.UserRegistered', function($event){
    
});

/**
 * Home routes
 */
Route::get('/', [
    'as' => 'home',
    'uses' => 'PagesController@home'
]);

/**
 * Registrations
 */
Route::get("register", [
    'as' => 'register_path',
    'uses' => 'RegistrationController@create'
]);
Route::post("register", [
    'as' => 'register_path',
    'uses' => 'RegistrationController@store'
]);

/**
 * Sessions
 */
Route::get('login', [
    'as' => 'login_path',
    'uses' => 'SessionsController@create'
]);
Route::post('login', [
    'as' => 'login_path',
    'uses' => 'SessionsController@store'
]);
Route::get('logout', [
    'as' => 'logout_path',
    'uses' => 'SessionsController@destroy'
]);

/**
 * Account
 */
Route::get('account', [
    'as' => 'account_path',
    'uses' => 'AccountsController@show'
]);

/**
 * Locations
 */
Route::get('locations', [
    'as' => 'locations_path',
    'uses' => 'LocationsController@index'
]);

Route::get('locations/add', [
    'as' => 'add_location_path',
    'uses' => 'LocationsController@create'
]);

Route::post('locations/add', [
    'as' => 'add_locations_path',
    'uses' => 'LocationsController@store'
]);