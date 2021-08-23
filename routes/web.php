<?php

use Illuminate\Support\Facades\Route;

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

/*Route::get('/', function () {
    return view('login');
});*/

/*Route::group(['middleware' => ['auth']], function () {
    //Route::get('/', 'HomeController@index')->name('home');
    Route::resource('home', 'HomeController');
});*/

Auth::routes();

//Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/', 'Auth\LoginController@getLogin');
Route::post('login', 'Auth\LoginController@postLogin');
Route::get('login/logout', 'Auth\LoginController@logout');
Route::get('/callback', 'Auth\LoginController@callback');

Route::resource('teams', 'teamController');
Route::get('teams/delete/{id}', 'teamController@destroy');
Route::get('teams/addsupervisor/{id}', 'teamController@addsupervisor');
Route::post('teams/storeTmSvisor/{id}', 'teamController@storeSupervisor');

Route::resource('supervisors', 'supervisorController');
Route::get('supervisors/delete/{id}', 'supervisorController@destroy');

Route::get('home', 'HomeController@getIndex')->name('home.index');

Route::resource('user', 'UserController');
Route::get('user/delete/{id}', 'UserController@destroy');

