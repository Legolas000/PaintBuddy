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

//Route::get('/', function () {
//    return view('welcome');
//});

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

Route::group(['middleware' => ['web']], function () {
    //
});

Route::get('/',function()
{
    return View::make('pages.home');
});

Route::get('/ArtMainOrders',"Artist\ArtsController@ViewAOrders");
Route::get('/ArtMainOrdersC', 'Artist\ArtsController@ViewCOrders');
Route::get('/ArtMainOrdersO', 'Artist\ArtsController@ViewOOrders');
Route::get('/chOrdeStat/{ordID}','Artist\ArtsController@UpdOrderStat');
Route::get('/ArtMainCal',"Artist\ArtsController@ViewCal");//Calendar path


