<?php

namespace App\Http\Controllers;


use App\Category;
use App\Product;
use App\customerdetail;
use App\order;
use App\payment;
use App\Http\Controllers\Controller;

//use Illuminate\Support\Facades\Request;
//use Illuminate\Support\Facades\Redirect;
//use Cart;
use Illuminate\Support\Facades\Input;
//
//use Session;




use Illuminate\Http\Request;
class PagesController extends Controller
{
//
//    var $categories;
//    var $products;
//    var $title;
//    var $description;
//
//
//    public function __construct() {
//
//        $this->categories = Category::all(array('name'));
//        $this->products = Product::all(array('id','name','price','description'));
//    }



//
//    public function index()
//    {
//        return view('pages.index');
//    }


    public function category(){


                    $categories = Category::all();

                    $products = Product::all();

         return view('pages.category',compact('categories','products'));


    }


//    public function product_details($id) {
//        $product = Product::find($id);
//        return view('pages.detail', array('product' => $product, 'title' => $product->name,'description' => '','page' => 'products','categories' => $this->categories, 'products' => $this->products));
//    }


    public function about(){

             $products = Product::all();

              return view('pages.about',compact('products'));
    }


    public function show($id){

                $product= Product::findOrFail($id);

//return $id;
        //dd($product);
            return view('pages.detail',compact('product'));

    }



    public function create(Request $request){


        $sub = $request->input('ordersub1','10');
        //$sub = Input::get('item_id');

//        $sub = $request->get('ordersub');
//        $sub = $request->get('ordersub');
//
//return $sub;

            return view('pages.checkout1',compact('sub'));



    }


    public function store(Request $request)
    {

        $customer_detail = new customerdetail;

        $customer_detail->firstName = Input::get('firstname');

        $customer_detail->lastName = Input::get('lastname');

        $customer_detail->company = Input::get('company');

        $customer_detail->street = Input::get('street');

        $customer_detail->city = Input::get('city');

        $customer_detail->zip = Input::get('zip');

        $customer_detail->state = Input::get('state');

        $customer_detail->country = Input::get('country');

        $customer_detail->telephone = Input::get('telephone');

        $customer_detail->email = Input::get('email');


        //return $customer_detail->firstName;

        $customer_detail->save();

        return view('pages.checkout2');

    }



    public function store1(Request $request){





         $order = new order;

        $order->delMethod = Input::get('delivery');

        $order->save();


        $data = $request->session()->get('items');
////        return "successfully saved to DB" ;
//
        return view('pages.checkout3',compact('data'));







//        $payment = new payment;
//
//        $payment->payMethod = Input::get('delivery');
//
//        $payment->save();
//
//
//        $data = $request->session()->get('items');
////        return "successfully saved to DB" ;
//
//        return view('pages.checkout3',compact('data'));



    }



    public function sample(){

        return view('pages.sample1');
    }


    public function checkout4(Request $request){
        $order = new order;

        $order->status = Input::get('delivery');

        $order->save();


        $data = $request->session()->get('products');
//        return "successfully saved to DB" ;

        return view('pages.checkout4',compact('data'));
       // return view('pages.checkout4');
    }

    public function store2(Request $request){

        $payment = new payment;

        $payment->payMethod = Input::get('payment');

        $payment->save();


        $data = $request->session()->get('items');

        return view('pages.checkout4',compact('data'));


    }








}
