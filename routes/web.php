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


Route::get('/login', function () {
    return view('login');
});
Route::group(['middleware' => 'auth'], function () {
    Route::get('/', function () {
        return view('homepage');
    })->name('homepage');

    //REQUEST
    Route::get('/request/new', 'RequestController@new')->name('request.new');
    Route::post('/request/post', 'RequestController@post')->name('request.post');
    Route::get('/request/view', 'RequestController@view')->name('request.view');
    Route::get('/request/{id}', 'RequestController@edit')->name('request.edit');
    Route::post('/request/edit', 'RequestController@editpost')->name('request.editpost');
    Route::get('/request/revision/view/{id}', 'RequestController@revision')->name('request.revision');
    Route::post('/request/revision/post', 'RequestController@revision_post')->name('revision.post');
    Route::get('/request/revision/list', 'RequestController@revision_list')->name('revision.list');

    //USER
    Route::get('/user', 'UserController@index')->name('user.view');
    Route::post('/user/new', 'UserController@new')->name('user.new');
});


Route::get('/test', function () {
    return view('homepage');
});
Route::post('/test/regist', 'RequestController@test_regist')->name('request.test_regist');


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

//ajax
Route::post('/ajax/view_request', 'RequestController@ajax_view_request');
Route::post('/ajax/update_request', 'RequestController@ajax_update_request');
Route::post('/ajax/update_request_development', 'RequestController@ajax_update_request_development');
Route::post('/ajax/update_request_done', 'RequestController@ajax_update_request_done');
Route::post('/ajax/delete_user', 'UserController@ajax_delete_user');