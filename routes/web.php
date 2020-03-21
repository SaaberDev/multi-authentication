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

    use Illuminate\Support\Facades\Auth;
    use Illuminate\Support\Facades\Route;

    Route::get('/', 'frontend\PagesController@index')->name('index');
    Route::group(['prefix' => '/', 'middleware' => 'role:isSuperAdmin'], function (){
        Route::get('/dashboard', 'backend\DashboardController@index')->name('dashboard');
    });

    Auth::routes();
