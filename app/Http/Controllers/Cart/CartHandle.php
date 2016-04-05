<?php

namespace App\Http\Controllers\Cart;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Item;
use Illuminate\Support\Facades\Session;

/**
 * Class CartHandle
 *  Handle the all shopping cart functions
 * @package App\Http\Controllers
 */
class CartHandle extends Controller
{
    /**
     * @param Request $request
     * this function is for adding products to the shopping cart
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function add(Request $request)
    {

        if ($request->isMethod('post'))
        {
            $item_id = $request->get('item_id');
            $has_item = false;
            $item = Item::find($item_id);
            $cat_name = $request->get('catName');

            if(Session::has('items'))
            {
                foreach ($request->session()->get('items') as $items)
                {
                    if ($items['id'] == $item_id)
                    {
                        $has_item = true;
                    }
                }
            }

            if(!$has_item)
            {
                $request->session()->push('items', ['id' => "$item->itID",'quantity'=>1, 'name' => "$item->itName", 'price' => "$item->price", 'imgpath' => "$item->imName"]);
            }

            //$request->session()->flush();
            //retrieve the session array
            $data = $request->session()->get('items');

            return view('pages.cart.cart', compact('data', 'i', 'n','cat_name'));
        }
    }


    /**
     * @param Request $request
     * this is the function where update the shopping cart and mainly consider about the change the quantity and display the total amount
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function update(Request $request)
    {
        if ($request->isMethod('post'))
        {
            if ($request->get('UpdateCart'))
            {
                $data = $request->session()->get('items');
                $request->session()->pull('items');

                foreach ($data as $item)
                {
                    $quantity = $request->get($item['id'] . 'quantity');
                    $request->session()->push('items', ['id' => $item['id'],'quantity'=>$quantity, 'name' => $item['name'], 'price' => $item['price'], 'imgpath' => $item['imgpath']]);
                }

                $data = $request->session()->get('items');
                $cat_name = $request->get('catName');


                return view('pages.cart.cart', compact('data', 'cart', 'total', 'n', 'cat_name'));
            }
        }

        //this is the remove item from shoiing cart
        if ($request->isMethod('post'))
        {
            if ($request->get('cartDestroy'))
            {
                $data = $request->session()->get('items');
                $item_id = $request->get('cartDestroy');
                //first pull product details from the session array
                $request->session()->pull('items');

                foreach ($data as $item)
                {
                    if($item['id'] != $item_id)
                    {
                        $request->session()->push('items', ['id' => $item['id'], 'quantity' => $item['quantity'], 'name' => $item['name'], 'price' => $item['price'], 'imgpath' => $item['imgpath']]);
                    }
                }

                $data = $request->session()->get('items');
                $cat_name = $request->get('catName');

                return view('pages.cart.cart',compact('data','cat_name'));
            }
        }
    }

    /**
     * @param Request $request
     * @return string
     */
    public function destroy(Request $request)
    {
        return 'hello';
    }
}
