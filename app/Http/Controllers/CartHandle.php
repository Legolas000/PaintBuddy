<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
//
////use App\Http\Requests;
//use App\Http\Controllers\Controller;
////use Illuminate\Support\Facades\Request;
////use App\Http\Controllers\Product;
//
//use App\category;
use App\product;
use App\Item;
////use Illuminate\Support\Str;
//
//use Illuminate\Support\Facades\Request;
//use Illuminate\Support\Facades\Redirect;
use Cart;
//
//use Session;

class CartHandle extends Controller
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

//            var  $i =0;


    public function add(Request $request)
    {

//
//        $i = ($this->i);
//        $i=$i++;
//        return $i;
        if ($request->isMethod('post')) {
//            if(!Session::has('cart.items')) {
//            $i=1;
            $item_id = $request->get('item_id');
            $item = Item::find($item_id);

//            $n=$request->get('quantity');
            //     $total=($product->price);


//            dd($n);

            $request->session()->push('items', ['id' => "$item->itID", 'name' => "$item->itName", 'price' => "$item->price",'imgpath' => "$item->imPath"]);

            // Cart::add(array('id' => $product_id, 'name' => $product->name, 'qty' => 1, 'price' => $product->price));
//            $request->session()->push('name', $product->name);
//            $request->session()->push('price', $product->price);
//            $request->session()->push('qty', 1);
//
//
//            $product_id = $request->session()->get('product_id');
//            $product_name = $request->session()->get('name');
//            $product_price = $request->session()->get('price');
//            $product_qty = $request->session()->get('qty');
//
//
//            if ($request->session()->has('product_id')){
//
//                $request->session()->put('qty', 2);
//                $product_qty = $request->session()->get('qty');
//
//
//            }
//$request->session()->flush();
//            $i=0;
            $data = $request->session()->get('items');

//               // Session::push('cart.items', array('id' => $product_id, 'name' => $product->name, 'qty' => 1, 'price' => $product->price));
//                //Cart::add(array('id' => $product_id, 'name' => $product->name, 'qty' => 1, 'price' => $product->price));
//
            $n = 1;
////            if(!Session::has('cart.items')) {
//                Session::push('cartitems', 1);
//                Session::push('cartitems', 2);
//                Session::push('cartitems_qty', 1);
////            }
////            else {
//
//
//                Session::push('cartitems', 3);
//                Session::push('cartitems', 4);
//                Session::push('cartitems_qty',2);
////            }
//
//
//            if(session::get(['cartitems'=>1])){
//                echo "Helll";
//            }
//
//
//            }
////        }
//
//
//
////        $cart = Cart::content();
//        //Session::get('cartitems');
////
////       foreach(Session::get('cart.items')as $items) {
////
////           $cart[] = Session::get('cart.items');
////
////       }
////     $cart_items = [Session::get('cart.items') ];
////        echo $cart;
//        //return Session::get('cart.items');
//      //  return $cart[0] ;
//   //   return view('pages.cart',['cart_items' => Session::get('cart.items')]);
//     //dd(Session::get('cart.items'));
//
//
//
//       dd([Session::get('cartitems')]);

            //  return view('pages.cart',Session::get('cart.items'));

            //$request->session()->flush();
            //    return $data;

            // $cart = Cart::content();

            // return view('pages.cart', compact('data', 'cart','total'));

            return view('pages.cart', compact('data', 'i', 'n'));
        }
    }

//
    public function update(Request $request)
    {

        if ($request->isMethod('post')) {
            if ($request->get('UpdateCart')) {


                foreach ($request->session()->get('items') as $item) {


                    $n = $request->get('quantity'); // say we  want to double the quantity for itemId 2

                    $item_id = $request->get('item_id');

                    if ($n != 1) {
                        $total = $item['price'] * $n;

                        $total = $item['price'];
                        $name = $item['name'];

                        if ($item['id'] == $item_id) {
                            //$request->session()->push('products', ['id' => $product_id, 'name' => $item['name'], 'price' => $item['price'], 'title' => $item['title']]);
                            $datas = $request->session()->get('items');
                            $request->session()->pull('items', ['id' => $item_id, 'name' => $name, 'price' => $item['price'],'imgpath' => "$item->imPath"]);
                            //return json_encode($datas);
                            // $request->session()->push('products', ['id' => $product_id, 'name' => $name, 'price' => $item['price'], 'title' => $item['title']]);
                            foreach ($datas as $data) {
                                $request->session()->push('items', ['id' => $data['id'], 'name' => $data['name'], 'price' => $data['price'], 'imgpath' => $data['imgpath']]);
                               //return json_encode($data);
                            }
                            //  $items[] = $product_id;
                        }
                        //$data = $request->session()->get('products');

                    }

                    $data = $request->session()->get('items');
//                }

                    return view('pages.cart', compact('data', 'cart', 'total', 'n'));

                }

                $n = 1;
                $data = $request->session()->get('items');
                return view('pages.cart', compact('data', 'cart', 'total', 'n'));
            }
        }



        if ($request->isMethod('post')) {
            if ($request->get('cartDestroy')) {


                $data = $request->session()->get('items');
                $item_id = $request->get('item_id');


                $request->session()->forget('items');

                $data = $request->session()->get('items');

                return view('pages.cart',compact('data'));







            }


        }


















    }
























    public function destroy(Request $request){



           return 'hello';


    }






















}
