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
    Route::get('/discount','Discount\discountController@discount');
	

    //
});

//Route::get('/',function()
//{
//    return View::make('pages.home');
//});

Route::get('/','mPageController@viewImages');
Route::get('/ArtMainOrders','Artist\ArtsController@ViewAOrders');
Route::get('/ArtMainOrdersC', 'Artist\ArtsController@ViewCOrders');
Route::get('/ArtMainOrdersO', 'Artist\ArtsController@ViewOOrders');
Route::get('/chOrdeStat/{ordID}','Artist\ArtsController@UpdOrderStat');
Route::get('/ArtMainCal','Artist\ArtsController@ViewCal');//Calendar path
Route::get('/login', 'discountController@rlogin');




Route::get('/displaydiscount','Discount\discountController@displaydiscount');
Route::get('/assignpromotion', 'Discount\discountController@assignpromotion');
Route::get('/viewpromotion','Discount\discountController@viewpromotion');


//Route::get('/enterpromotion', 'Discount\discountController@enterpromotion');
//Route::get('/registerpromotion', 'Discount\discountController@registerpromotion');


Route::put('/addDiscount', 'Discount\discountController@addDiscount');
Route::post('/viewDiscount', 'Discount\discountController@viewDiscount');
Route::post('/enterpromotion', 'Discount\discountController@enterpromotion');
Route::post('/regpromotion', 'Discount\discountController@regpromotion');
Route::put('/setpromotion','Discount\discountController@setpromotion');

Route::get('/testmesage', 'Discount\discountController@testmesage');


Route::group(['middleware' => 'web'], function () {
    Route::auth();

    Route::get('/home1', 'HomeController@index');
});





















