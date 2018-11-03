<?php



Route::get('/', function () {
    return view('welcome');
});
Route::get('register','RegistrationController@create');
Route::post('register','RegistrationController@store');

Route::get('login','SessionControllerController@create');
Route::post('login','SessionControllerController@store');
Route::get('logout','SessionControllerController@destroy');
Route::get('dashboard','dashboardController@index');
Route::get('verify/{token}','SessionControllerController@verifyy');
