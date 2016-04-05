<?php

namespace App\Http\Controllers\Main;

use App\Category;
use App\Item;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Kryptonit3\Counter\Facades\CounterFacade;

/**
 * Class mPageController
 * This class contains the category page and controlling both category views and items views.
 * @package App\Http\Controllers
 */
class mPageController extends Controller
{
    /**
     * @param $catName
     * this function handle the viewing of category of products
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function viewCatDets($catName)
    {
        //retreive the categories images with product details based on the user click
        $imDets = DB::select(DB::raw("SELECT * FROM items WHERE catRef = (SELECT catID FROM categories WHERE catName ='$catName')"));
        $categories = Category::all();
        $items = Item::all();
        $data = session()->get('items');
//        return json_encode($imDets);
        return view('pages/Main/categoryView',compact('categories','items','imDets','catName','data'));
    }

    /**
     * @param $itemID
     * this function handle the viewing of details of products
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function viewItDets($itemID)
    {
        $itDets = DB::table('items')
            ->join('categories','items.catRef','=','categories.catID')
            ->where('items.itID','=',$itemID)
            ->first();

        $catDets = DB::table('categories')
            ->join('items', 'categories.catID', '=', 'items.catRef')
            ->where('items.itID','=',$itemID)
            ->select('categories.catName', 'items.itName')
            ->get();

        $catIDS = DB::table('categories')
            ->join('items', 'categories.catID', '=', 'items.catRef')
            ->where('items.itID','=',$itemID)
            ->distinct()
            ->lists('catID');

        $itOtherDet = DB::table('items')
            ->join('categories','items.catRef','=','categories.catID')
            ->where('categories.catID','=', $catIDS[0] )
            ->where('items.itID','!=',$itemID)
            ->skip(1)
            ->take(2)
            ->get();

        //retrive the session array
        $data = session()->get('items');
        //Increment count in page counter module
        CounterFacade::Count('ViewItDets',$itemID);

        return view('pages/Main/viewItemDets',compact('catDets','itDets','imDets','itOthers','itOtherDet','data'));
    }
}
