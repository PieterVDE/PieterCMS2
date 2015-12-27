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
Route::group(['middleware' => 'web'], function () {
    //Homepage
    Route::get('/', 'HomeController@index');
    Route::get('/home', function () {
        return redirect('/');
    });

    // Authentication
    Route::auth();

    //Content
    Route::get('content/add', 'ContentController@create');
    Route::post('content/add', 'ContentController@store');
    Route::get('content/{id}', 'ContentController@show');
//    Route::get('content/{id}/edit', 'ContentController@edit');
//    Route::post('content/{id}/edit', 'ContentController@update');
//    Route::post('content/{id}/delete', 'ContentController@delete');

    //Comments
    Route::post('content/{id}', 'CommentsController@store');
});
