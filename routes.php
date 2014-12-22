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

Route::pattern('id', '[0-9]+');

Route::get('/', array('before' => 'auth', 'uses' => 'HomeController@showWelcome'));
Route::get('home/about', array('before' => 'auth', 'uses' => 'HomeController@about'));
Route::get('home/feedback', array('before' => 'auth', 'uses' => 'HomeController@feedback'));
Route::get('home/help', array('before' => 'auth', 'uses' => 'HomeController@help'));
Route::get('home/notice', array('before' => 'auth', 'uses' => 'HomeController@notice'));
Route::get('home/progress', array('before' => 'auth', 'uses' => 'HomeController@showProgress'));
Route::get('home/memo', array('before' => 'auth', 'uses' => 'HomeController@showMemo'));

//About Users
Route::get('login', 'UserController@login');
Route::post('login', 'UserController@login');
Route::get('logout', array('before' => 'auth', 'uses' => 'UserController@logout'));
Route::get('user/profile', array('before' => 'auth', 'uses' => 'UserController@profile'));
Route::post('user/update', array('before' => 'auth', 'uses' => 'UserController@update'));

//About Posts
Route::get('post/create', array('before' => 'auth', 'uses' =>'PostController@create'));
Route::get('post/test', array('before' => 'auth', 'uses' =>'PostController@test'));
Route::post('post/create', array('before' => 'auth', 'uses' =>'PostController@create'));
Route::get('post/edit/id/{id}', array('before' => 'auth', 'uses' =>'PostController@edit'));
Route::post('post/edit/id/{id}', array('before' => 'auth', 'uses' =>'PostController@edit'));
Route::get('post/delete/id/{id}', array('before' => 'auth', 'uses' =>'PostController@delete'));
Route::get('post/lists', array('before' => 'auth', 'uses' =>'PostController@lists'));
Route::get('post/view/id/{id}', array('before' => 'auth', 'uses' =>'PostController@view'));

//About Project Progress
Route::get('project_progress/create', array('before' => 'auth', 'uses' =>'ProgressController@create'));
Route::post('project_progress/create', array('before' => 'auth', 'uses' =>'ProgressController@create'));
Route::get('project_progress/edit/id/{id}', array('before' => 'auth', 'uses' =>'ProgressController@edit'));
Route::post('project_progress/edit/id/{id}', array('before' => 'auth', 'uses' =>'ProgressController@edit'));
Route::get('project_progress/delete/id/{id}', array('before' => 'auth', 'uses' =>'ProgressController@delete'));
Route::get('project_progress/lists', array('before' => 'auth', 'uses' =>'ProgressController@lists'));
Route::get('project_progress/view/id/{id}', array('before' => 'auth', 'uses' =>'ProgressController@view'));

//About Project Subprogress
Route::get('project_progress/sub_create/id/{id}', array('before' => 'auth', 'uses' =>'ProgressController@sub_create'));
Route::post('project_progress/sub_create/id/{id}', array('before' => 'auth', 'uses' =>'ProgressController@sub_create'));
Route::get('project_progress/sub_edit/id/{id}', array('before' => 'auth', 'uses' =>'ProgressController@sub_edit'));
Route::post('project_progress/sub_edit/id/{id}', array('before' => 'auth', 'uses' =>'ProgressController@sub_edit'));
Route::get('project_progress/sub_delete/id/{id}', array('before' => 'auth', 'uses' =>'ProgressController@sub_delete'));
Route::get('project_progress/sub_view/id/{id}', array('before' => 'auth', 'uses' =>'ProgressController@sub_view'));

//About Project Memo
Route::get('project_memo/create', array('before' => 'auth', 'uses' =>'MemoController@create'));
Route::post('project_memo/create', array('before' => 'auth', 'uses' =>'MemoController@create'));
Route::get('project_memo/edit/id/{id}', array('before' => 'auth', 'uses' =>'MemoController@edit'));
Route::post('project_memo/edit/id/{id}', array('before' => 'auth', 'uses' =>'MemoController@edit'));
Route::get('project_memo/delete/id/{id}', array('before' => 'auth', 'uses' =>'MemoController@delete'));
Route::get('project_memo/lists', array('before' => 'auth', 'uses' =>'MemoController@lists'));
Route::get('project_memo/view/id/{id}', array('before' => 'auth', 'uses' =>'MemoController@view'));

//About Project Submemo
Route::get('project_memo/sub_create/id/{id}', array('before' => 'auth', 'uses' =>'MemoController@sub_create'));
Route::post('project_memo/sub_create/id/{id}', array('before' => 'auth', 'uses' =>'MemoController@sub_create'));
Route::get('project_memo/sub_edit/id/{id}', array('before' => 'auth', 'uses' =>'MemoController@sub_edit'));
Route::post('project_memo/sub_edit/id/{id}', array('before' => 'auth', 'uses' =>'MemoController@sub_edit'));
Route::get('project_memo/sub_delete/id/{id}', array('before' => 'auth', 'uses' =>'MemoController@sub_delete'));
Route::get('project_memo/sub_view/id/{id}', array('before' => 'auth', 'uses' =>'MemoController@sub_view'));

//About Admin
Route::get('admin/index', 'AdminController@index');
Route::get('admin/deleteuser/id/{id}', 'AdminController@deleteuser');
Route::get('admin/createuser', 'AdminController@createuser');
Route::post('admin/createuser', 'AdminController@createuser');
Route::get('admin/updateuser/id/{id}', 'AdminController@updateuser');
Route::post('admin/updateuser/id/{id}', 'AdminController@updateuser');
Route::get('admin/lists/id/{id}', 'AdminController@lists');



Route::get('test',function()
{
	//phpinfo();
    echo Hash::make('test');
});
