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

/**
 * Design sandbox to try different things
 */
Route::get('sandbox', function(){
    return View::make('pages.sandbox');
});

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

/**
 * Local Classes
 */
Route::get('classes', [
    'as' => 'local_classes_path',
    'uses' => 'LocalClassesController@index'
]);

Route::get('classes/add', [
    'as' => 'add_local_class_path',
    'uses' => 'LocalClassesController@create'
]);

Route::post('classes/add', [
    'as' => 'add_local_class_path',
    'uses' => 'LocalClassesController@store'
]);

Route::get('classes/{date}', [
    'as' => 'show_class',
    'uses' => 'LocalClassesController@show'
]);

Route::get('classes/{date}/students', [
    'as' => 'class_info_path',
    'uses' => 'LocalClassesController@info'
]);

/**
 * Enrollment
 */
Route::get('classes/{date}/enroll',[
    'as' => 'enroll_path',
    'uses' => 'EnrollmentController@create'
]);

Route::post('classes/{date}/enroll', [
    'as' => 'enroll_path',
    'uses' => 'EnrollmentController@store'
]);

/**
 * Promotions
 */

Route::get('promo', [
    'as' => 'promo_path',
    'uses' => 'PromotionsController@index'
]);

Route::get('promo/add', [
    'as' => 'add_promo_path',
    'uses' => 'PromotionsController@create'
]);

Route::post('promo/add', [
        'as' => 'add_promo_path',
        'uses' => 'PromotionsController@store'
]);