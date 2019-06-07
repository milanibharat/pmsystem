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
    return view('welcome');
});

Auth::routes();
Route::post('site-register', 'Auth\LoginController@siteRegisterPost');

Route::get('/home', 'HomeController@index')->name('home');

Route::middleware(['auth'])->group(function(){
    
Route::resource('companies','CompaniesController');

Route::get('/projects/create/{company_id?}','ProjectsController@create');
Route::post('/projects/adduser','ProjectsController@adduser')->name('projects.adduser') ;
Route::resource('projects','ProjectsController');


Route::get('/tasks/create/{company_id?}','TasksController@create');
Route::post('/tasks/adduser','TasksController@adduser')->name('tasks.adduser') ;
Route::resource('tasks','TasksController');

Route::resource('roles','RolesController');
Route::resource('tasks','TasksController');
Route::resource('users','UsersController');
Route::resource('comments','CommentsController');

//Route::get('/url','CommentsController@url');                  //for gravity form (problem to load)

});