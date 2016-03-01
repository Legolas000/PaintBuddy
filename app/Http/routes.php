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

    Route::get('/',function(){
        return View::make('pages.main.home');
    });   //Main Page controller
    Route::get('/contact',function(){
       return View::make('pages.main.static.contact');
    });

    Route::get('/dboard','Artist\ArtMBoardController@viewPage');

    Route::get('/cat.{catName}','mPageController@viewCatDets');
    Route::get('/viewDets.{itemID}',['uses'=>'mPageController@viewItDets', 'as' =>'ViewItDets']);
    //Route::get('/viewDets.{itemID}','mPageController@viewItDets');

//    Route::get('/cMail',function(){
//       return View::make('pages.Artist.artMailPage');
//    });

    Route::get('/mail','Artist\ArtsMailController@showMailInt');
    Route::post('/cMail','Artist\ArtsMailController@sendMail');

    Route::get('/ArtMainOrders','Artist\ArtsOrdersController@ViewAOrders');//For orders part
    Route::get('/ArtMainOrdersC', 'Artist\ArtsOrdersController@ViewCOrders');
    Route::get('/ArtMainOrdersO', 'Artist\ArtsOrdersController@ViewOOrders');
    Route::get('/ArtOrdCustRating', 'Artist\ArtsOrdersController@ViewCusRatOrd');
    Route::get('/chOrdeStat/{ordID}','Artist\ArtsOrdersController@UpdOrderStat');
    Route::get('/canCusOrd/{ordID}','Artist\ArtsOrdersController@CancOrder');
  // Route::get('/ArtMainCal','Artist\ArtsOrdersController@ViewCal');//Calendar path

    Route::get('/ArtAsDead','Artist\ArtsOrdersController@ViewOOrdersDD');   //For assisgn dates part
    Route::post('/asDDate','Artist\ArtsOrdersController@UpOrdDD');

//    Route::get('/aitem',function(){
//        return View::make('pages\Artist\artTemplates');
//    });

    Route::get('/aitem','Artist\ArtsItemsController@loadDets'); //For items
    Route::post('aitem/add','Artist\ArtsItemsController@addItems');
    Route::get('/chIteStat/{itID}','Artist\ArtsItemsController@chItemStatus');
    Route::post('/upDatePrice','Artist\ArtsItemsController@upPrices');


    Route::get('/artRep', ['uses' =>'Artist\ArtsReportManager@index', 'as' => 'Report']);        //For Payment report
    Route::post('/CpRep', ['uses' =>'Artist\ArtsReportManager@genCPReport']);
    Route::post('/CCpRep',['uses' =>'Artist\ArtsReportManager@genCCPReport']);



    //Route::get('/artChartView','Artist\ArtsChartController@colData');
    //Route::get('/artChartView','Artist\ArtsChartController@view');
    //Route::post('/artChartView','Artist\ArtsChartController@colData');

    Route::any('/artChartView', [ 'uses'=>'Artist\ArtsChartController@view']);
    Route::any('/retColData', [ 'uses'=>'Artist\ArtsChartController@colData']);


    Route::any('/artPView','Artist\ArtsPageViewController@viewItemCount');
    Route::any('/retPViewDate',['uses' => 'Artist\ArtsPageViewController@retGraphData']);
});

//Route::get('/',function()
//{
//    return View::make('pages.home');
//});
