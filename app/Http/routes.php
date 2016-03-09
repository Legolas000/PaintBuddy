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
Route::group(['middleware' => ['web']], function () {

	//Common routes
    Route::get('/',function(){
        return view('pages.main.home');
    });

    Route::get('/contact',function(){
        return view('pages.main.categoryView');
    });
	Route::get('/cat.{catName}','mPageController@viewCatDets');
    Route::get('/viewDets.{itemID}',['uses'=>'mPageController@viewItDets', 'as' =>'ViewItDets']);

	
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
	
	//Artist Dashboard
    Route::get('/dboard','Artist\ArtMBoardController@viewPage');

    //Send Mail
    Route::post('/cMail','Artist\ArtsMailController@sendMail');

    //Main orders management
    Route::get('/ArtMainOrders','Artist\ArtsOrdersController@ViewAOrders');
    Route::get('/ArtMainOrdersC', 'Artist\ArtsOrdersController@ViewCOrders');
    Route::get('/ArtMainOrdersO', 'Artist\ArtsOrdersController@ViewOOrders');
    Route::get('/ArtOrdCustRating', 'Artist\ArtsOrdersController@ViewCusRatOrd');
    Route::get('/chOrdeStat/{ordID}','Artist\ArtsOrdersController@UpdOrderStat');
    Route::get('/canCusOrd/{ordID}','Artist\ArtsOrdersController@CancOrder');
    Route::get('/viewOrDets={ordID}','Artist\ArtsOrdersController@viewDets');

    //Deadline assingment management
    Route::get('/ArtAsDead','Artist\ArtsOrdersController@ViewOOrdersDD');
    Route::post('/asDDate','Artist\ArtsOrdersController@UpOrdDD');

    //Template Management
    Route::get('/aitem','Artist\ArtsItemsController@loadDets');
    Route::post('aitem/add','Artist\ArtsItemsController@addItems');
    Route::get('/chIteStat/{itID}','Artist\ArtsItemsController@chItemStatus');
    Route::post('/upDatePrice','Artist\ArtsItemsController@upPrices');

    //Report generation
    Route::get('/artRep', ['uses' =>'Artist\ArtsReportManager@index', 'as' => 'Report']);        //For Payment report
    Route::post('/CpRep', ['uses' =>'Artist\ArtsReportManager@genCPReport']);
    Route::post('/CCpRep',['uses' =>'Artist\ArtsReportManager@genCCPReport']);
    Route::post('/itRep',['uses' =>'Artist\ArtsReportManager@genItReport']);
    Route::post('/ordRep',['uses' =>'Artist\ArtsReportManager@genORDReport']);

    //View chart for payments
    Route::any('/retColData', [ 'uses'=>'Artist\ArtsChartController@colData']);

    //For ViewPageCount
    Route::any('/artPView','Artist\ArtsPageViewController@viewItemCount');
    Route::any('/retPViewDate',['uses' => 'Artist\ArtsPageViewController@retGraphData']);
});