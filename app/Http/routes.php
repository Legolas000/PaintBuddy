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

Route::get();

Route::group(['middleware' => ['web']], function () {


    Route::get('/',function(){

       // return view('layout.layout');
        return view('pages.main.home');
    });

    Route::get('/contact',function(){
        return view('pages.main.categoryView');
    });

	//Firnas's Routes
    Route::get('/index', 'PagesController@index');

    Route::get('/category', 'PagesController@category');

    Route::get('cart', 'CartHandle@add');
    Route::post('cart', 'CartHandle@add');

    Route::post('cartUpdate', 'CartHandle@update');

    Route::get('checkoutCreate', 'PagesController@create');
    Route::post('checkoutCreate', 'PagesController@store');

    Route::post('checkoutCreate1', 'PagesController@store1');

    Route::post('checkoutCreate2', 'PagesController@store2');

    Route::post('checkout4', 'PagesController@checkout4');

    Route::get('category.{id}','PagesController@show');

    Route::get('/sample', 'CartHandle@test');

    Route::get('about', 'PagesController@about');

    Route::get('about/create', 'PagesController@create');

    Route::get('sample', 'PagesController@sample');

    Route::get('about/{id}', 'PagesController@show');

    Route::get('sample1', 'PagesController@sample1');

	
	
	
	//Sinthujan's Routes
	Route::get('/dboard','Artist\ArtMBoardController@viewPage');	//Main Dashboard+Views
	Route::get('/cat.{catName}','mPageController@viewCatDets');
    Route::get('/viewDets.{itemID}',['uses'=>'mPageController@viewItDets', 'as' =>'ViewItDets']);


    Route::get('/mail','Artist\ArtsMailController@showMailInt');	//Sending Mail
    Route::post('/cMail','Artist\ArtsMailController@sendMail');

    Route::get('/ArtMainOrders','Artist\ArtsOrdersController@ViewAOrders');	//Order Management
    Route::get('/ArtMainOrdersC', 'Artist\ArtsOrdersController@ViewCOrders');
    Route::get('/ArtMainOrdersO', 'Artist\ArtsOrdersController@ViewOOrders');
    Route::get('/ArtOrdCustRating', 'Artist\ArtsOrdersController@ViewCusRatOrd');
    Route::get('/chOrdeStat/{ordID}','Artist\ArtsOrdersController@UpdOrderStat');
    Route::get('/canCusOrd/{ordID}','Artist\ArtsOrdersController@CancOrder');
	
    Route::get('/ArtAsDead','Artist\ArtsOrdersController@ViewOOrdersDD');   	//Deadline Management
    Route::post('/asDDate','Artist\ArtsOrdersController@UpOrdDD');

    Route::get('/aitem','Artist\ArtsItemsController@loadDets'); 	//Template Management
    Route::post('aitem/add','Artist\ArtsItemsController@addItems');
    Route::get('/chIteStat/{itID}','Artist\ArtsItemsController@chItemStatus');
    Route::post('/upDatePrice','Artist\ArtsItemsController@upPrices');


    Route::get('/artRep', ['uses' =>'Artist\ArtsReportManager@index', 'as' => 'Report']);  //Report Generation
    Route::post('/CpRep', ['uses' =>'Artist\ArtsReportManager@genCPReport']);
    Route::post('/CCpRep',['uses' =>'Artist\ArtsReportManager@genCCPReport']);

    Route::any('/artChartView', [ 'uses'=>'Artist\ArtsChartController@view']);		//Graphs Creation
    Route::any('/retColData', [ 'uses'=>'Artist\ArtsChartController@colData']);


    Route::any('/artPView','Artist\ArtsPageViewController@viewItemCount');			//View Mangement
    Route::any('/retPViewDate',['uses' => 'Artist\ArtsPageViewController@retGraphData']);

});