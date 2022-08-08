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

        Route::get('/', function () {
            return view('auths.login');
        });

        Route::get('/login','AuthController@login')->name('login');
        Route::post('/postlogin','AuthController@postlogin');
        Route::get('/logout','AuthController@logout');

        Route::group(['middleware'=>['auth','checkrole:admin']],function(){
            Route::get('/dashboard','DashboardController@index');
            Route::get('/prajurit','PrajuritController@index');
            Route::get('/prajurit/filter','PrajuritController@filter');
            Route::post('/prajurit/create','PrajuritController@create');
            Route::get('/token', function (Request $request) {
                $token = $request->session()->token();
            
                $token = csrf_token();
            });
            Route::get('/prajurit/{id}/edit','PrajuritController@edit');
            Route::post('/prajurit/{id}/update','PrajuritController@update');
            Route::get('/prajurit/{id}/delete','PrajuritController@delete');
            Route::get('/penilaian', 'PenilaianController@index')->name('test');
            Route::post('/core', 'NaiveCoreController@naivebayes')->name('naive');
            Route::get('/data', 'AdminController@index')->name('data');
            Route::post('/data/add', 'AdminController@postData')->name('postData');
            // <route penilaian>
            Route::post('/penilaian/create','PenilaianController@create');
            Route::get('/penilaian/{id}/edit','PenilaianController@edit');
            Route::post('/penilaian/{id}/update','PenilaianController@update');
            Route::get('/penilaian/{id}/delete','PenilaianController@delete');
            // <route datauser>
            Route::get('/user','UserController@index');
            Route::post('/user/create','UserController@create');
            Route::get('/user/{id}/edit','UserController@edit');
            Route::post('/user/{id}/update','UserController@update');
            Route::get('/user/{id}/delete','UserController@delete');

        });
        Route::group(['middleware'=>['auth','checkrole:penilai,admin']],function(){
            Route::get('/dashboard','DashboardController@index');
            Route::post('/penilaian/create','PenilaianController@create');
            Route::get('/penilaian', 'PenilaianController@index')->name('test');
            Route::post('/core', 'NaiveCoreController@naivebayes')->name('naive');
            Route::get('/prajurit','PrajuritController@index');
        
        });