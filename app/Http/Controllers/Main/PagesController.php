<?php

namespace App\Http\Controllers\Main;

use App\Category;
use App\customerdetail;
use App\Itemorder;
use App\order;
use App\Product;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;

/**
 * Class PagesController
 * This controller handles the pages
 * @package App\Http\Controllers
 */
class PagesController extends Controller
{
    /**
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function category()
    {
        $categories = Category::all();
        $products = Product::all();

        return view('pages.Cart.category',compact('categories','products'));
    }


    /**
     * about page
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function about()
    {
        $products = Product::all();

        return view('pages.Cart.about',compact('products'));
    }


    /**
     * @param $id
     * show the details page
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function show($id)
    {
        $product= Product::findOrFail($id);

        return view('pages.Cart.detail',compact('product'));
    }


    /**
     * @param Request $request
     * first checkout page
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create(Request $request)
    {
        $totQTY = $request->get('catName');;

        return view('pages.Cart.checkout1', compact('$sub','totQTY'));
    }


    /**
     * @param Request $request
     * store customer details
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function store(Request $request)
    {

        $this->validate($request, [
            // regex contains to some extend validations
            'fullname' => 'required|regex:/(^[A-Za-z . ]+$)+/|between:5,40',
            'city' => 'required',
            'locationtype' => 'required',
            'phoneno' => 'required|digits:10',
            'address1' => 'required|regex:/(^[A-Za-z0-9 .\,\/ ]+$)+/',
            'address2' => 'required|regex:/(^[A-Za-z0-9 .\, ]+$)+/',
            'delivery_date' => 'required|date|after:today',
            'email' => 'required|',

        ]);
        //object creation
        $customer_detail = new customerdetail;

        $customer_detail->fullName = Input::get('fullname');
        $customer_detail->city = Input::get('city');
        $customer_detail->locationType = Input::get('locationtype');
        $customer_detail->phoneNo = Input::get('phoneno');
        $customer_detail->addressLine1 = Input::get('address1');
        $customer_detail->addressLine2 = Input::get('address2');
        $customer_detail->delDate = Input::get('delivery_date');
        $customer_detail->email = Input::get('email');

        $customer_detail->save();

        $deliveryDate = Input::get('delivery_date');
        $address1 = Input::get('address1');
        $address2 = Input::get('address2');

        return view('pages.Cart.checkout2',compact('deliveryDate','address1','address2'));

    }


    /**
     * @param Request $request
     * store order details
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function store1(Request $request)
    {
        $order = new order;

        $order->ordDate = date("Y-m-d h:i:sa");
        $order->DLineDate = Input::get('deliverydate');
        $order->Quantity = Input::get('quantit');
        $order->delMethod = Input::get('delivery');

        if($order->delMethod == "normal")
            $deliveryCharge = 0;
        else
            $deliveryCharge = 400;

        $order->delCharge = $deliveryCharge;

        $id = DB::table('customerdetails')->orderBy('cusID', 'desc')->value('cusID');

        $order->delID    = $id;
        $order->custID = "mayuraselvarajah26@gmail.com";
        $order->save();

        $addresss1 = Input::get('addresses1');
        $addresss2 = Input::get('addresses2');

        $data = $request->session()->get('items');

        return view('pages.Cart.checkout3',compact('data','deliveryCharge','addresss1','addresss2'));

    }


    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function sample()
    {
        return view('pages.sample');
    }


    /**
     * @param Request $request
     * store payment methods
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function store2(Request $request)
    {
        $paymentMethod = Input::get('payment');
        session()->put('pMethod',$paymentMethod);
        $id = DB::table('orders')->orderBy('ordID', 'desc')->value('ordID');

        DB::table('orders')
            ->where('ordID', $id)
            ->update(['paymentMethod' => $paymentMethod]);

        $addresss1 = Input::get('addresses1');
        $addresss2 = Input::get('addresses2');
        $deliveryCharge = Input::get('deliveryCharges');

        $data = $request->session()->get('items');

        $itemOrders = new Itemorder;

        $id = DB::table('orders')->orderBy('ordID', 'desc')->value('ordID');
        foreach($data as $items)
        {
            DB::table('itemorders')->insert(["itID" => $items['id'], 'ordID' => $id,"qty" => $items['quantity']]);
        }


        return view('pages.Cart.checkout4',compact('data','addresss1','addresss2','deliveryCharge'));
    }
}
