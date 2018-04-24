<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::auth();

Route::get('/BonRegist/login', 'UserController@showLogin');
Route::get('/BonRegist/logout', 'UserController@doLogout');

Route::group(['middleware' => 'auth'], function(){
    Route::group(['middleware' => 'editor'], function (){
        Route::get('/BonRegist/home', 'EditorController@showHome');
        Route::get('/BonRegist/registBon', 'EditorController@showRegistBon');
        Route::post('/BonRegist/registBon/data', 'EditorController@registNewBon');
        Route::get('/BonRegist/updateBon', 'EditorController@showUpdateBon');
        Route::get('/BonRegist/updateBon/sorted', 'EditorController@sortByDate');
        Route::get('/BonRegist/updateBon/editTrans/{id}', 'EditorController@editTrans');
        Route::put('/BonRegist/updateBon/editTrans/{id}/update', 'EditorController@updateTrans');
    });

    Route::group(['middleware' => 'admin'], function (){

        Route::get('/BonRegist/updateUser/{id}/edit','AdminController@editUser');
        Route::put('/BonRegist/updateUser/{id}','AdminController@updateUser');
        Route::delete('/BonRegist/updateUser/{id}/delete','AdminController@deleteUser');

        Route::post('/BonRegist/addUser/data', 'AdminController@addNewUser');
    });
});
Route::get('/BonRegist/addUser', 'AdminController@showAddUser');
Route::get('/BonRegist/updateUser', 'AdminController@showUpdateUser');

Route::post('/BonRegist/addUser/data', 'AdminController@addNewUser');


//Route::get('/home', 'HomeController@index');
