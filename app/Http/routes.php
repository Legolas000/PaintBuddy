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

    //Main Page routes
    Route::get('/',function(){
        return View::make('pages.main.home');
    });
    Route::get('/contact',function(){
       return View::make('pages.main.static.contact');
    });
    Route::get('/cat.{catName}','mPageController@viewCatDets');
    Route::get('/viewDets.{itemID}',['uses'=>'mPageController@viewItDets', 'as' =>'ViewItDets']);

    //Artist Dashboard
    Route::get('/dboard','Artist\ArtMBoardController@viewPage');

    //Mail Management
    Route::get('/getMailBox.type={type}','Artist\ArtsMailController@retMailView');
    Route::post('/cMail','Artist\ArtsMailController@sendMail');
    Route::get('/getMail','Artist\ArtsMailController@getInbox');
    Route::get('/viewMail.MailID={MailID}.type={type}','Artist\ArtsMailController@viewMail');
    Route::post('/delMail','Artist\ArtsMailController@delMail');

    //Main orders management
    Route::get('/ArtMainOrders','Artist\ArtsOrdersController@ViewAOrders');
    Route::get('/ArtMainOrdersC', 'Artist\ArtsOrdersController@ViewCOrders');
    Route::get('/ArtMainOrdersO', 'Artist\ArtsOrdersController@ViewOOrders');
    Route::get('/chOrdeStat/{ordID}','Artist\ArtsOrdersController@UpdOrderStat');
    Route::get('/viewOrDets={ordID}','Artist\ArtsOrdersController@viewDets');

    //Deadline assingment management
    Route::get('/ArtAsDead','Artist\ArtsOrdersController@ViewOOrdersDD');
    Route::post('/asDDate','Artist\ArtsOrdersController@UpOrdDD');

    //Item Management
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
    Route::any('/custOrdRep',['uses' =>'Artist\ArtsReportManager@genCustOrdDets']);

    //View chart for payments
    Route::any('/retColData', [ 'uses'=>'Artist\ArtsChartController@colData']);

    //For ViewPageCount
    Route::any('/artPView','Artist\ArtsPageViewController@viewItemCount');
    Route::any('/retPViewDate',['uses' => 'Artist\ArtsPageViewController@retGraphData']);

    //User details
    Route::get('/gUsrDetsA','Artist\ArtUserDetsController@getActiveUsrDets');
    Route::get('/gUsrDetsIA','Artist\ArtUserDetsController@getInActiveUsrDets');
    Route::get('/gUsrDetsAd','Artist\ArtUserDetsController@getAdminUsrDets');
    Route::get('/gUsrDetsC','Artist\ArtUserDetsController@getCustUsrDets');


    //Settings Pages
    Route::get('/getsPage',function(){
        return View::make('pages.Artist.artSettingView');
    });
    Route::get('/exportDB','Artist\ArtSettingsController@exportDB');
    Route::post('/importDB','Artist\ArtSettingsController@importDB');   //Doesn't work properly have a look later


    //Exception handling
    Route::get('/dbExcp',function(){
        return View::make('errors.503');
    });
    Route::get('/imapExcp',function(){
        return View::make('errors.503');
    });
    Route::get('/smailExcp',function(){
        return View::make('errors.503');
    });

    //Template Management
    Route::get('/aTempDes','Artist\ArtsTempController@loadDesDets');
    Route::get('/aTempBac','Artist\ArtsTempController@loadBacDets');
    Route::post('/aTempDes/add','Artist\ArtsTempController@addDesign');
    Route::post('/aTempBac/add','Artist\ArtsTempController@addBack');
    Route::post('/upTempPrice','Artist\ArtsTempController@upPrices');
    Route::get('/chTempStatus/{id}','Artist\ArtsTempController@chTempStatus');

    //Design Templates
    Route::get('/cTemp','User\UsCustTempController@viewCusPage');
    Route::get('/test','User\UsCustTempController@custArrDesign');

});