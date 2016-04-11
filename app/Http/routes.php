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
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

Route::group(['middleware' => ['web']], function () {

    //Main Page routes
    Route::get('/',function(){
        return View::make('pages.main.home');
    });
    Route::get('/contact',function(){
       return View::make('pages.main.static.contact');
    });
    Route::get('/cat.{catName}','Main\mPageController@viewCatDets');
    Route::get('/viewDets.{itemID}',['uses'=>'Main\mPageController@viewItDets', 'as' =>'ViewItDets']);
    //Category View
//    Route::get('/category', 'Main\PagesController@category');         What's this?






    //{{Sinthujan's Route }}
    //Artist Dashboard
    Route::get('/dboard','Artist\ArtMBoardController@viewPage');

    //Send Mail
    Route::post('/cMail','Artist\ArtsMailController@sendMail');

    //Main orders management
    Route::get('/ArtMainOrders','Artist\ArtsOrdersController@ViewAOrders');
    Route::get('/ArtMainOrdersC', 'Artist\ArtsOrdersController@ViewCOrders');
    Route::get('/ArtMainOrdersO', 'Artist\ArtsOrdersController@ViewOOrders');
    Route::get('/chOrdeStat/{ordID}','Artist\ArtsOrdersController@UpdOrderStat');
    Route::get('/viewOrDets={ordID}','Artist\ArtsOrdersController@viewDets');

    //Deadline assignment management
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
    Route::any('/custOrdRep',['uses' =>'Artist\ArtsReportManager@genCustOrdDets']);

    //View chart for payments
    Route::any('/retColData', [ 'uses'=>'Artist\ArtsChartController@colData']);

    //For ViewPageCount
    Route::any('/artPView','Artist\ArtsPageViewController@viewItemCount');
    Route::any('/retPViewDate',['uses' => 'Artist\ArtsPageViewController@retGraphData']);



    //{{Arham's Routes}}

    //Discount routes
    Route::get('/discount','Discount\discountController@discount');
    Route::get('/displaydiscount','Discount\discountController@displaydiscount');
    Route::put('/addDiscount', 'Discount\discountController@addDiscount');
    Route::post('/viewDiscount', 'Discount\discountController@viewDiscount');
    //Promotion Routes
    Route::get('/assignpromotion', 'Discount\discountController@assignpromotion');
    Route::get('/viewpromotion','Discount\discountController@viewpromotion');
    Route::post('/enterpromotion', 'Discount\discountController@enterpromotion');
    Route::post('/regpromotion', 'Discount\discountController@regpromotion');
    Route::put('/setpromotion','Discount\discountController@setpromotion');



    //{{Mayura's Routes}}

    Route::resource('register', 'User\RegisterController@index');
    Route::resource('/login','User\RegisterController@getLogin');
    Route::resource('/myaccount','User\RegisterController@getAccount');
    Route::resource('/myorders','User\OrderController@getOrder');
    Route::resource('/ResetPassword','User\MailController@getPassword');
    Route::resource('violate', 'User\RegisterController@postLogin');
    Route::resource('/home','User\RegisterController@getHome');
    Route::resource('/logout','User\RegisterController@getlogout');
    //Route::resource('/logout','User\RegisterController@getlogout');
    Route::get('/myorderView.{id}','User\OrderController@myorderView');
    //get deactive page to send mail
    Route::resource('/deactive', 'User\RegisterController@deactive');
    //get deactive reason page
    Route::resource('/deactive_reason', 'User\MailController@deactive');
    Route::get('/item_review.{itID}', 'User\OrderController@get_item_review');
    Route::resource('/item_list', 'User\OrderController@get_item_list');

    Route::resource('register_store', 'User\RegisterController@store');
    Route::post('image','User\MailController@image');
    Route::resource('review_add', 'User\OrderController@add_item_review');
    Route::resource('/change_details','User\RegisterController@chprofile');
    Route::resource('/change_password','User\RegisterController@newpwd');
    Route::resource('/email_reset_password','User\MailController@postResetPassword');
    Route::resource('/email_deactive','User\MailController@postDeactive');
    Route::resource('email_reactive','User\MailController@postActive');
    Route::resource('reactive','User\RegisterControll@Active');
   // Route::resource('pdf/{ID}','User\OrderController@makePDF');



    //{{Firnas's Routes}}

    //Shopping Cart Page
    Route::get('cart', 'Cart\CartHandle@add');
    Route::post('cart', 'Cart\CartHandle@add');

    Route::post('cartUpdate', 'Cart\CartHandle@update');

    Route::get('checkoutCreate', 'Main\PagesController@create');
    Route::post('checkoutCreate', 'Main\PagesController@store');

    Route::post('checkoutCreate1', 'Main\PagesController@store1');

    Route::get('/a',function()
    {
        return view('pages.checkout3');
    });

    Route::get('/b',function()
    {
        return view('pages.checkout2');
    });

    Route::get('/c',function()
    {
        return view('pages.checkout1');
    });

    Route::post('checkoutCreate2', 'Main\PagesController@store2');

    Route::post('checkout4', 'Main\PagesController@checkout4');

//    Route::get('category.{id}','Main\PagesController@show');  What's this>?

    Route::get('/sample', 'Cart\CartHandle@test');

    Route::get('about', 'Main\PagesController@about');

    Route::get('about/create', 'Main\PagesController@create');

    Route::get('sample', 'Main\PagesController@sample');

    Route::get('about/{id}', 'Main\PagesController@show');

    Route::get('sample1', 'Main\PagesController@sample1');

//    Route::get('/cat.{catName}','Main\mPageController@viewCatDets');

//    Route::get('/viewDets.{itemID}','Main\mPageController@viewItDets');

    //routes for handling paypal support to our project
    Route::get('payment', array(
          'as' => 'payment',
          'uses' => 'PaypalController@postPayment',
    ));

    Route::get('payment/status', array(
           'as' => 'payment.status',
           'uses' => 'PaypalController@getPaymentStatus',
    ));

    //sending mail functions
    Route::post('sendemail', function (\Illuminate\Support\Facades\Request $request)
    {
        //        return session()->get('tamount');
        $products = session()->get('items');
        DB::table('payments')->insert(["payDate"=>\Carbon\Carbon::now(), "totalAmount" => session()->get('tamount'), "payMethod" => session()->get('pMethod')]);

        Mail::send('pages.Cart.show', $products, function ($message) {
            $message->from('paintbuddyProj@gmail.com', 'PaintBuddy.com');
            $message->to(DB::table('customerdetails')->orderBy('cusID', 'desc')->value('email'))->subject('Order details');
        });

        session()->flush();

        return view('pages.main.home');

    });

});
